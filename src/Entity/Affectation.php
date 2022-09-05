<?php

namespace App\Entity;

use App\Repository\AffectationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AffectationRepository::class)]
class Affectation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codebar;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updatedAt;

    #[ORM\Column(type: 'string', length: 255)]
    private $etatActuel;

    #[ORM\ManyToOne(targetEntity: Exemplaire::class, inversedBy: 'affectations')]
    #[ORM\JoinColumn(nullable: false)]
    private $exemplaire;

    #[ORM\ManyToOne(targetEntity: Personnel::class, inversedBy: 'affectations')]
    #[ORM\JoinColumn(nullable: false)]
    private $personnel;

    #[ORM\ManyToOne(targetEntity: Emplacement::class, inversedBy: 'affectations')]
    #[ORM\JoinColumn(nullable: false)]
    private $emplacement;

    #[ORM\ManyToOne(targetEntity: Projet::class, inversedBy: 'affectations')]
    #[ORM\JoinColumn(nullable: false)]
    private $projet;

    #[ORM\ManyToOne(targetEntity: Volet::class, inversedBy: 'affectations')]
    #[ORM\JoinColumn(nullable: false)]
    private $volet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodebar(): ?string
    {
        return $this->codebar;
    }

    public function setCodebar(?string $codebar): self
    {
        $this->codebar = $codebar;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getEtatActuel(): ?string
    {
        return $this->etatActuel;
    }

    public function setEtatActuel(string $etatActuel): self
    {
        $this->etatActuel = $etatActuel;

        return $this;
    }

    public function getExemplaire(): ?exemplaire
    {
        return $this->exemplaire;
    }

    public function setExemplaire(?exemplaire $exemplaire): self
    {
        $this->exemplaire = $exemplaire;

        return $this;
    }

    public function getPersonnel(): ?personnel
    {
        return $this->personnel;
    }

    public function setPersonnel(?personnel $personnel): self
    {
        $this->personnel = $personnel;

        return $this;
    }

    public function getProjet(): ?projet
    {
        return $this->projet;
    }

    public function setProjet(?projet $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    public function getVolet(): ?volet
    {
        return $this->volet;
    }

    public function setVolet(?volet $volet): self
    {
        $this->volet = $volet;

        return $this;
    }

    public function getEmplacement(): ?emplacement
    {
        return $this->emplacement;
    }

    public function setEmplacement(?emplacement $emplacement): self
    {
        $this->emplacement = $emplacement;

        return $this;
    }
}
