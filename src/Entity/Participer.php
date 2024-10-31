<?php

namespace App\Entity;

use App\Repository\ParticiperRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticiperRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Participer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $montant = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $waveId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $waveCheckoutStatus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $waveClientReference = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $wavePaymentStatus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $waveWhenCompleted = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $waveWhenCreated = null;

    #[ORM\ManyToOne]
    private ?Campeur $campeur = null;

    #[ORM\ManyToOne]
    private ?Formation $formation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $waveTransactionId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(?int $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getWaveId(): ?string
    {
        return $this->waveId;
    }

    public function setWaveId(?string $waveId): static
    {
        $this->waveId = $waveId;

        return $this;
    }

    public function getWaveCheckoutStatus(): ?string
    {
        return $this->waveCheckoutStatus;
    }

    public function setWaveCheckoutStatus(?string $waveCheckoutStatus): static
    {
        $this->waveCheckoutStatus = $waveCheckoutStatus;

        return $this;
    }

    public function getWaveClientReference(): ?string
    {
        return $this->waveClientReference;
    }

    public function setWaveClientReference(?string $waveClientReference): static
    {
        $this->waveClientReference = $waveClientReference;

        return $this;
    }

    public function getWavePaymentStatus(): ?string
    {
        return $this->wavePaymentStatus;
    }

    public function setWavePaymentStatus(?string $wavePaymentStatus): static
    {
        $this->wavePaymentStatus = $wavePaymentStatus;

        return $this;
    }

    public function getWaveWhenCompleted(): ?string
    {
        return $this->waveWhenCompleted;
    }

    public function setWaveWhenCompleted(?string $waveWhenCompleted): static
    {
        $this->waveWhenCompleted = $waveWhenCompleted;

        return $this;
    }

    public function getWaveWhenCreated(): ?string
    {
        return $this->waveWhenCreated;
    }

    public function setWaveWhenCreated(?string $waveWhenCreated): static
    {
        $this->waveWhenCreated = $waveWhenCreated;

        return $this;
    }

    public function getCampeur(): ?Campeur
    {
        return $this->campeur;
    }

    public function setCampeur(?Campeur $campeur): static
    {
        $this->campeur = $campeur;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): static
    {
        $this->formation = $formation;

        return $this;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): \DateTime
    {
        return $this->createdAt = new \DateTime();
    }

    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): \DateTime
    {
        return $this->updatedAt = new \DateTime();
    }

    public function getWaveTransactionId(): ?string
    {
        return $this->waveTransactionId;
    }

    public function setWaveTransactionId(?string $waveTransactionId): static
    {
        $this->waveTransactionId = $waveTransactionId;

        return $this;
    }
}
