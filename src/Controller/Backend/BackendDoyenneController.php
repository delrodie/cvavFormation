<?php

namespace App\Controller\Backend;

use App\Entity\Doyenne;
use App\Form\DoyenneType;
use App\Repository\DoyenneRepository;
use App\Service\AllRepositories;
use App\Service\Gestion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/backend/doyenne')]
final class BackendDoyenneController extends AbstractController
{
    public function __construct(
        private Gestion $gestion, private AllRepositories $allRepositories
    )
    {
    }

    #[Route('/', name: 'app_backend_doyenne_index', methods: ['GET','POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager, DoyenneRepository $doyenneRepository): Response
    {
        $doyenne = new Doyenne();
        $form = $this->createForm(DoyenneType::class, $doyenne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Verification du code
            if ($this->gestion->codeDoyenne($doyenne) === false){
                sweetalert()->addError("Soit ce doyenné a déjà été ajouté ou vous devez associer un vicariat valide");
                return $this->redirectToRoute('app_backend_doyenne_index', [], Response::HTTP_SEE_OTHER);
            }


            $entityManager->persist($doyenne);
            $entityManager->flush();

            sweetalert()->addSuccess("Le doyenné {$doyenne->getNom()} a été ajouté avec succès!");

            return $this->redirectToRoute('app_backend_doyenne_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backend_doyenne/index.html.twig', [
            'doyennes' => $doyenneRepository->findBy([],['nom' => "ASC"]),
            'doyenne' => $doyenne,
            'form' => $form,
            'suppression' => false
        ]);
    }

    #[Route('/new', name: 'app_backend_doyenne_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $doyenne = new Doyenne();
        $form = $this->createForm(DoyenneType::class, $doyenne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($doyenne);
            $entityManager->flush();

            return $this->redirectToRoute('app_backend_doyenne_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backend_doyenne/new.html.twig', [
            'doyenne' => $doyenne,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_backend_doyenne_show', methods: ['GET'])]
    public function show(Doyenne $doyenne): Response
    {
        return $this->render('backend_doyenne/show.html.twig', [
            'doyenne' => $doyenne,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_backend_doyenne_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Doyenne $doyenne, EntityManagerInterface $entityManager, DoyenneRepository $doyenneRepository): Response
    {
        $form = $this->createForm(DoyenneType::class, $doyenne);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->gestion->updateCodeDoyenne($doyenne);
            $entityManager->flush();

            sweetalert()->addSuccess("Le doyenné {$doyenne->getNom()} a été modifié avec succès!");

            return $this->redirectToRoute('app_backend_doyenne_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backend_doyenne/edit.html.twig', [
            'doyennes' => $doyenneRepository->findBy([],['nom' => "ASC"]),
            'doyenne' => $doyenne,
            'form' => $form,
            'suppression' => true
        ]);
    }

    #[Route('/{id}', name: 'app_backend_doyenne_delete', methods: ['POST'])]
    public function delete(Request $request, Doyenne $doyenne, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$doyenne->getId(), $request->request->get('_token'))) {
            $entityManager->remove($doyenne);
            $entityManager->flush();

            sweetalert()->addSuccess("Le doyenné {$doyenne->getNom()} a été supprimé avec succès!");
        }

        return $this->redirectToRoute('app_backend_doyenne_index', [], Response::HTTP_SEE_OTHER);
    }
}
