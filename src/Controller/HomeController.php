<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\AllRepositories;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    public function __construct(private AllRepositories $allRepositories)
    {
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $formation = $this->allRepositories->getFormation();
        if (!$formation){
            return $this->redirectToRoute('app_cloture',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('frontend/index.html.twig',[
            'formation' => $formation
        ]);
    }

    #[Route('/cloture', name: 'app_cloture')]
    public function cloture(): Response
    {
        $formation = $this->allRepositories->getFormation();
        if ($formation)
            return $this->redirectToRoute('app_home',[], Response::HTTP_SEE_OTHER);

        return $this->render('frontend/cloture.html.twig');
    }
}
