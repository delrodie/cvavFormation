<?php

namespace App\Controller\Backend;

use App\Service\AllRepositories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dashboard')]
class DashboardController extends AbstractController
{
    public function __construct(
        private AllRepositories $allRepositories
    )
    {
    }

    #[Route('/', name: 'app_backend_dashboard')]
    public function dashboard(): Response
    {

        return $this->render('backend/dashboard.html.twig',[
            'montant' => $this->allRepositories->getMontantTotal(),
            'participants' => $this->allRepositories->getAllParticipantByStatut(true),
            'vicariats' => $this->allRepositories->statistiquesByVicariat(),
        ]);
    }
}