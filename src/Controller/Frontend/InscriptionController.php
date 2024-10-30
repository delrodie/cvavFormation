<?php

declare(strict_types=1);

namespace App\Controller\Frontend;

use App\Entity\Campeur;
use App\Form\InformationType;
use App\Form\JustificatifType;
use App\Service\AllRepositories;
use App\Service\Gestion;
use App\Service\GestionJustificatif;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/inscription')]
class InscriptionController extends AbstractController
{
    public function __construct(
        private Gestion $gestion, private readonly GestionJustificatif $gestionJustificatif, private readonly AllRepositories $allRepositories
    )
    {
    }

    #[Route('/', name: 'app_frontend_inscription_identite', methods: ['GET', 'POST'])]
    public function identite(Request $request): Response
    {
        $campeur = $request->getSession()->get('information');
        if (!$campeur)$campeur = new Campeur();

        $form = $this->createForm(InformationType::class, $campeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            if (!$this->gestion->getCampeurSlug($campeur)){
                sweetalert()->error("Vous êtes déjà inscrit(e)", [], "ECHEC");

                return $this->redirectToRoute('app_home');
            }

            $request->getSession()->set('information', $campeur);

            sweetalert()->success("Vos informations ont été ajoutées avec succès. Veuillez joindre vos justificatifs",[], "FELICITATIONS");

            return $this->redirectToRoute('app_frontend_inscription_justificatif',[], Response::HTTP_SEE_OTHER);
        }
        return $this->render('frontend/inscription_identite.html.twig',[
            'campeur' => $campeur,
            'form' => $form
        ]);
    }

    #[Route('/justificatif', name: 'app_frontend_inscription_justificatif', methods: ['GET','POST'])]
    public function justificatif(Request $request): Response
    {
        $campeur = $request->getSession()->get('information');

        if (!$campeur){
            sweetalert()->error("Veuillez renseigner votre identité avant d'ajoindre les justificatifs", [], "ATTENTION");

            return $this->redirectToRoute('app_frontend_inscription_identite',[], Response::HTTP_SEE_OTHER);
        }

        $form = $this->createForm(JustificatifType::class, $campeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->gestionJustificatif->pieceJointe($form, $campeur);

            $request->getSession()->set('information', $campeur);

            sweetalert()->success("Vos justificatifs ont été ajoutés avec succès! Veuillez ajouter votre base", [], 'FELICITATIONS!');

            return $this->redirectToRoute('app_frontend_inscription_section',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('frontend/inscription_justificatif.html.twig',[
            'form' => $form,
            'campeur' => $campeur,
        ]);
    }

    #[Route('/base/section', name: 'app_frontend_inscription_section')]
    public function section(Request $request): Response
    {
        if (!$request->getSession()->get('information')){
            sweetalert()->warning("Veuillez renseigner votre identité avant d'ajouter votre section de base", [], 'ATTENTION');
            return $this->redirectToRoute("app_frontend_inscription_identite", [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('frontend/inscription_section.html.twig',[
            'vicariats' => $this->allRepositories->getVicariat(),
        ]);
    }
}
