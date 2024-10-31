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
}