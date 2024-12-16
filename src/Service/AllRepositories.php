<?php

namespace App\Service;

use App\Repository\CampeurRepository;
use App\Repository\DoyenneRepository;
use App\Repository\FormationRepository;
use App\Repository\ParticiperRepository;
use App\Repository\SectionRepository;
use App\Repository\VicariatRepository;

class AllRepositories
{
    public function __construct(
        private CampeurRepository   $campeurRepository,
        private VicariatRepository  $vicariatRepository,
        private DoyenneRepository   $doyenneRepository,
        private SectionRepository   $sectionRepository,
        private FormationRepository $formationRepository,
        private readonly ParticiperRepository $participerRepository
    )
    {
    }

    public function findOneCampeur(string $slug)
    {
        return $this->campeurRepository->findOneBy(['slug' => $slug]);
    }

    public function findOneCampeurValide(string $slug)
    {
        return $this->campeurRepository->findOneBy(['slug' => $slug, 'statut' => 'VALIDE']);
    }

    public function getVicariat(int $id = null, string $slug = null)
    {
        if ($id){
            return $this->vicariatRepository->findOneBy(['id' => $id]);
        }

        if ($slug){
            return $this->vicariatRepository->findOneBy(['slug' => $slug]);
        }

        return $this->vicariatRepository->findBy([],['nom' => 'ASC']);
    }

    public function getLastVicariat(string $slug)
    {
        $lastVicariat = $this->vicariatRepository->findOneBy(['slug' => $slug]);
        if ($lastVicariat){
            return false;
        }
        return $this->vicariatRepository->findOneBy([],['id' => 'DESC']);
    }

    public function getDoyenneByVicariat(int $vicariat)
    {
        return $this->doyenneRepository->findBy(['vicariat' => $vicariat], ['nom' => 'ASC']);
    }

    public function getSectionByDoyenne(int $doyenne)
    {
        return $this->sectionRepository->findBy(['doyenne' => $doyenne], ['paroisse' => 'ASC']);
    }

    public function getDoyenne(int $id)
    {
        return $this->doyenneRepository->findOneBy(['id' => $id]);
    }

    public function getSection(int $id)
    {
        return $this->sectionRepository->findOneBy(['id' => $id]);
    }

    public function getCampeurByMatricule(string $matricule)
    {
        return $this->campeurRepository->findOneBy(['matricule' => $matricule]);
    }

    public function getFormation()
    {
        return $this->formationRepository->findFormationEncours();
    }

    public function getParticipationByCampeur(string $matricule)
    {
        return $this->participerRepository->findOneByCampeur($matricule);
    }

    public function getLastDoyenne(string $slug)
    {
        $lastDoyenne = $this->doyenneRepository->findOneBy(['slug' => $slug]);
        if ($lastDoyenne) return false;

        return $this->doyenneRepository->findOneBy([],['id' => "DESC"]);
    }

    public function getLastSection(string $slug)
    {
        $lastSection =  $this->sectionRepository->findOneBy(['slug' => $slug]);
        if ($lastSection) return false;

        return $this->sectionRepository->findOneBy([],['id' => "DESC"]);
    }

    public function getAllParticipantByStatut(bool $statut = null): array
    {
        $participants = $this->participerRepository->findAllByStatut($statut);
        $result=[]; $i=0;

        foreach ($participants as $participant) {
            $result[$i++] = $this->participantShow($participant);
        }

        return $result;
    }

    public function getParticipant($matricule): array
    {
        return $this->participantShow($this->participerRepository->findByMatricule($matricule));
    }

    public function participantShow($participant): array
    {
        return [
            'matricule' => $participant->getCampeur()->getMatricule(),
            'nom' => $participant->getCampeur()->getNom(),
            'prenoms' => $participant->getCampeur()->getPrenoms(),
            'telephone' => $participant->getCampeur()->getTelephone(),
            'bapteme' => $participant->getCampeur()->isBapteme() ? 'OUI' : 'NON',
            'confirmation' => $participant->getCampeur()->isConfirmation() ? 'OUI' : 'NON',
            'niveau' => $participant->getCampeur()->getNiveau(),
            'evaluation' => $participant->getCampeur()->getEvaluation(),
            'medical' => $participant->getCampeur()->isMedical() ? 'OUI' : 'NON',
            'traitement' => $participant->getCampeur()->getTraitement(),
            'urgence' => $participant->getCampeur()->getUrgence(),
            'contact_urgence' => $participant->getCampeur()->getContactUrgence(),
            'sexe' => $participant->getCampeur()->getSexe(),
            'date_naissance' => $participant->getCampeur()->getDateNaissance(),
            'lieu_naissance' => $participant->getCampeur()->getLieuNaissance(),
            'responsable' => $participant->getCampeur()->getResponsable(),
            'responsable_contact' => $participant->getCampeur()->getResponsableContact(),
            'section' => $participant->getCampeur()->getSection()->getParoisse(),
            'doyenne' => $participant->getCampeur()->getSection()->getDoyenne()->getNom(),
            'vicariat' => $participant->getCampeur()->getSection()->getDoyenne()->getVicariat()->getNom(),
            'formation' => $participant->getFormation()->getNom(),
            'lieu_formation' => $participant->getFormation()->getLieu(),
            'montant' => $participant->getMontant(),
            'created_at' => $participant->getWaveWhenCompleted(),
            'statut' => $participant->getWaveCheckoutStatus(),
            'payment_status' => $participant->getWavePaymentStatus(),
            'sacrement' => $participant->getCampeur()->getSacrement(),
            'dernier_culte' => $participant->getCampeur()->getDernierCulte(),
            'attestation' => $participant->getCampeur()->getAttestation()
        ];
    }
}