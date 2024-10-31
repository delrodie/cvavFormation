<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Service\AllRepositories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/api/wave')]
class ApiWaveController extends AbstractController
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private SerializerInterface $serializer,
        private AllRepositories $allRepositories,
        private EntityManagerInterface $entityManager
    )
    {
    }

    #[Route('/', name: 'app_api_wave_checkout', methods: ['POST'])]
    public function checkout(Request $request): JsonResponse
    {
//        $aspirant = $request->getSession()->get('aspirant');
        $data = json_decode($request->getContent(), true);
        //dump($data['success_url']);

        try {
            $response = $this->httpClient->request(
                'POST',
                'https://api.wave.com/v1/checkout/sessions',[
                    'json' => $data,
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->getParameter('wave_api_key'),
                        'Content-Type' => 'application/json',
                    ]
                ]
            );

            if ($response->getStatusCode() === 200){
                $content = json_decode($response->getContent());
                $matricule = basename($data['success_url']);

                $aspirant = $this->allRepositories->getCampeurByMatricule($matricule);
                $participation = $this->allRepositories->getParticipationByCampeur($matricule);

                if ($participation){
                    $participation->setWaveId($content->id);
                    $participation->setWaveCheckoutStatus($content->checkout_status);
                    $participation->setWaveClientReference($content->client_reference);
                    $participation->setWavePaymentStatus($content->payment_status);
                    $participation->setWaveWhenCompleted($content->when_completed);
                    $participation->setWaveWhenCreated($content->when_created);

                    $aspirant->setStatut('SOUMIS');

                    $this->entityManager->flush();

                    $request->getSession()->get('information', '');
                    $request->getSession()->get('campeur', '');
                }
            }

            return $this->json($response);
        } catch (\Exception $exception){
            return new JsonResponse(['error' => $exception->getMessage()], 500);
        }
    }
}
