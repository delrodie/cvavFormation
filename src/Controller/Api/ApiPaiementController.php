<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Entity\Campeur;
use App\Entity\Participer;
use App\Service\AllRepositories;
use App\Service\Gestion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/paiement')]
class ApiPaiementController extends AbstractController
{
    public function __construct(
        private Gestion $gestion,
        private readonly AllRepositories $allRepositories,
        private EntityManagerInterface $entityManager
    )
    {
    }

    #[Route('/', name: 'app_api_paiement_save', methods: ['POST'])]
    public function save(Request $request): Response
    {
        $getContent = json_decode($request->getContent(), true); //dd($getContent);
        $reqSection = (int) $getContent['selectSection'];
        $reqVicariat = (int) $getContent['selectVicariat'];
        $reqDoyenne = (int) $getContent['selectDoyenne'];
        $inputResponsable = (string) $this->gestion->validForm($getContent['inputResponsable']);
        $inputContact = (string) $this->gestion->validForm($getContent['inputContact']);

        $participant = $request->getSession()->get('information');

        $formation = $this->allRepositories->getFormation();

        $campeur = New Campeur();
        $campeur->setNom(strtoupper($participant->getNom()));
        $campeur->setPrenoms(strtoupper($participant->getPrenoms()));
        $campeur->setMatricule($this->gestion->matricule($reqDoyenne));
        $campeur->setSection($this->allRepositories->getSection($reqSection));
        $campeur->setSexe($participant->getSexe());
        $campeur->setDateNaissance($participant->getDateNaissance());
        $campeur->setLieuNaissance($participant->getLieuNaissance());
        $campeur->setTelephone($participant->getTelephone());
        $campeur->setBapteme($participant->isBapteme());
        $campeur->setConfirmation($participant->isConfirmation());
        $campeur->setNiveau($participant->getNiveau());
        $campeur->setEvaluation($participant->getEvaluation());
        $campeur->setMedical($participant->isMedical());
        $campeur->setTraitement($participant->getTraitement());
        $campeur->setUrgence($participant->getUrgence());
        $campeur->setContactUrgence($participant->getContactUrgence());
        $campeur->setSacrement($participant->getSacrement());
        $campeur->setDernierCulte($participant->getDernierCulte());
        $campeur->setAttestation($participant->getAttestation());
        $campeur->setSlug($participant->getSlug());
        $campeur->setResponsable(strtoupper($inputResponsable));
        $campeur->setResponsableContact($inputContact);

        $this->entityManager->persist($campeur);

        // Particiaption
        $participation = new Participer();
        $participation->setMontant((int) $formation->getMontant());
        $participation->setCampeur($campeur);
        $participation->setFormation($formation);

        $this->entityManager->persist($participation);

        $this->entityManager->flush();

        $result = [
            'matricule' => $campeur->getMatricule(),
            'montant' => $participation->getMontant(),
        ];

        return $this->json($result);
    }
}
