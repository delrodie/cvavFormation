<?php

namespace App\Entity;

use App\Repository\CampeurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CampeurRepository::class)]
class Campeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $matricule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenoms = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(nullable: true)]
    private ?bool $bapteme = null;

    #[ORM\Column(nullable: true)]
    private ?bool $confirmation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveau = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $evaluation = null;

    #[ORM\Column(nullable: true)]
    private ?bool $medical = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $traitement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $urgence = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $contactUrgence = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sacrement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dernierCulte = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $attestation = null;

    #[ORM\ManyToOne]
    private ?Section $section = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): static
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->prenoms;
    }

    public function setPrenoms(?string $prenoms): static
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function isBapteme(): ?bool
    {
        return $this->bapteme;
    }

    public function setBapteme(?bool $bapteme): static
    {
        $this->bapteme = $bapteme;

        return $this;
    }

    public function isConfirmation(): ?bool
    {
        return $this->confirmation;
    }

    public function setConfirmation(?bool $confirmation): static
    {
        $this->confirmation = $confirmation;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getEvaluation(): ?string
    {
        return $this->evaluation;
    }

    public function setEvaluation(?string $evaluation): static
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    public function isMedical(): ?bool
    {
        return $this->medical;
    }

    public function setMedical(?bool $medical): static
    {
        $this->medical = $medical;

        return $this;
    }

    public function getTraitement(): ?string
    {
        return $this->traitement;
    }

    public function setTraitement(?string $traitement): static
    {
        $this->traitement = $traitement;

        return $this;
    }

    public function getUrgence(): ?string
    {
        return $this->urgence;
    }

    public function setUrgence(?string $urgence): static
    {
        $this->urgence = $urgence;

        return $this;
    }

    public function getContactUrgence(): ?string
    {
        return $this->contactUrgence;
    }

    public function setContactUrgence(?string $contactUrgence): static
    {
        $this->contactUrgence = $contactUrgence;

        return $this;
    }

    public function getSacrement(): ?string
    {
        return $this->sacrement;
    }

    public function setSacrement(?string $sacrement): static
    {
        $this->sacrement = $sacrement;

        return $this;
    }

    public function getDernierCulte(): ?string
    {
        return $this->dernierCulte;
    }

    public function setDernierCulte(?string $dernierCulte): static
    {
        $this->dernierCulte = $dernierCulte;

        return $this;
    }

    public function getAttestation(): ?string
    {
        return $this->attestation;
    }

    public function setAttestation(?string $attestation): static
    {
        $this->attestation = $attestation;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): static
    {
        $this->section = $section;

        return $this;
    }
}
