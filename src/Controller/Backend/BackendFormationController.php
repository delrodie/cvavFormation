<?php

namespace App\Controller\Backend;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/backend/formation')]
final class BackendFormationController extends AbstractController
{
    #[Route(name: 'app_backend_formation_index', methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager, FormationRepository $formationRepository): Response
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($formation);
            $entityManager->flush();

            sweetalert()->success("La formation '{$formation->getNom()}' a été ajoutée avec succès!");

            return $this->redirectToRoute('app_backend_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backend_formation/index.html.twig', [
            'formations' => $formationRepository->findAll(),
            'formation' => $formation,
            'form' => $form,
            'suppression' => false
        ]);
    }

    #[Route('/new', name: 'app_backend_formation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($formation);
            $entityManager->flush();

            return $this->redirectToRoute('app_backend_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backend_formation/new.html.twig', [
            'formation' => $formation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_backend_formation_show', methods: ['GET'])]
    public function show(Formation $formation): Response
    {
        return $this->render('backend_formation/show.html.twig', [
            'formation' => $formation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_backend_formation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Formation $formation, EntityManagerInterface $entityManager, FormationRepository $formationRepository): Response
    {
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_backend_formation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backend_formation/edit.html.twig', [
            'formations' => $formationRepository->findAll(),
            'formation' => $formation,
            'form' => $form,
            'suppression' => true
        ]);
    }

    #[Route('/{id}', name: 'app_backend_formation_delete', methods: ['POST'])]
    public function delete(Request $request, Formation $formation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formation->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($formation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_backend_formation_index', [], Response::HTTP_SEE_OTHER);
    }
}
