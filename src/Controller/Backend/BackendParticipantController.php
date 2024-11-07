<?php

declare(strict_types=1);

namespace App\Controller\Backend;

use App\Service\AllRepositories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/backend/participant')]
class BackendParticipantController extends AbstractController
{
    public function __construct(private readonly AllRepositories $allRepositories)
    {
    }

    #[Route('/', name: 'app_backend_participant_confirme')]
    public function confirme(): Response
    {
        return $this->render('backend/participant_confirme.html.twig',[
            'participants' => $this->allRepositories->getAllParticipantByStatut(true)
        ]);
    }

    #[Route('/{matricule}', name: 'app_backend_participant_show', methods: ['GET'])]
    public function show($matricule): Response
    {
        return $this->render('backend/participant_show.html.twig',[
            'participant' => $this->allRepositories->getParticipant($matricule)
        ]);
    }

    #[Route('/non/confirme', name: 'app_backend_participant_nonconfirme')]
    public function nonconfirme(): Response
    { //dd($this->allRepositories->getAllParticipantByStatut());
        return $this->render('backend/participant_nonconfirme.html.twig',[
            'participants' => $this->allRepositories->getAllParticipantByStatut(),
        ]);
    }
}
