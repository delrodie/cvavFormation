<?php

declare(strict_types=1);

namespace App\Controller\Frontend;

use App\Service\AllRepositories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/recu')]
class RecuController extends AbstractController
{
    public function __construct(
        private AllRepositories $allRepositories,
        private HttpClientInterface $httpClient,
        private EntityManagerInterface $entityManager
    )
    {
    }

    #[Route('/{matricule}', name: 'app_frontend_recu_show', methods: ['GET'])]
    public function show($matricule): Response
    {
        $participation = $this->allRepositories->getParticipationByCampeur($matricule);

        if ($participation && $participation->getWaveCheckoutStatus() !== 'complete'){
            $wave = $this->wave($participation);
            if ($wave !== true) return new Response ($wave);
        }
        return $this->render('frontend/recu.html.twig',[
            'participation' => $participation
        ]);
    }

    public function wave($participation)
    {
        $response = $this->httpClient->request(
            'GET',
            "https://api.wave.com/v1/checkout/sessions/{$participation->getWaveId()}",[
                'headers' => [
                    'Authorization' => 'Bearer '.$this->getParameter('wave_api_key'),
                ],
                'timeout' => 5
            ]
        );

        if ($response->getStatusCode() !== 200){
            return  "HTTP Error ".$response->getStatusCode();
        }

        $data = $response->toArray();

        if ($data['checkout_status'])
            $participation->setWaveCheckoutStatus($data['checkout_status']);
        if ($data['payment_status'])
            $participation->setWavePaymentStatus($data['payment_status']);
        if ($data['when_completed'])
            $participation->setWaveWhenCompleted($data['when_completed']);
        if ($data['transaction_id'])
            $participation->setWaveTransactionId($data['transaction_id']);

        $this->entityManager->flush();

        return true;
    }
}
