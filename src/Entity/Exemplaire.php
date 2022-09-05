<?php

namespace App\Entity;

use App\Repository\ExemplaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExemplaireRepository::class)]
class Exemplaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codebar;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $codeCrs;
    
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $serial;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updatedAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\Column(type: 'string', length: 255)]
    private $etatInitial;

    #[ORM\ManyToOne(targetEntity: Article::class, inversedBy: 'exemplaires')]
    #[ORM\JoinColumn(nullable: false)]
    private $article;
    

    #[ORM\ManyToOne(targetEntity: Origine::class, inversedBy: 'exemplaires')]
    #[ORM\JoinColumn(nullable: false)]
    private $origine;

    #[ORM\OneToMany(mappedBy: 'exemplaire', targetEntity: Affectation::class)]
    private $affectations;
    #[ORM\OneToMany(mappedBy: 'exemplaire', targetEntity: Inventaire::class)]
    private $inventaires;

   

    public function __construct()
    {
        $this->affectations = new ArrayCollection();
        $this->inventaires = new ArrayCollection();
    }

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
    public function getCodeCrs(): ?string
    {
        return $this->codeCrs;
    }

    public function setCodeCrs(?string $codeCrs): self
    {
        $this->codeCrs = $codeCrs;

        return $this;
    }
    public function getSerial(): ?string
    {
        return $this->serial;
    }

    public function setSerial(?string $serial): self
    {
        $this->serial = $serial;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getEtatInitial(): ?string
    {
        return $this->etatInitial;
    }

    public function setEtatInitial(string $etatInitial): self
    {
        $this->etatInitial = $etatInitial;

        return $this;
    }

    public function getArticle(): ?article
    {
        return $this->article;
    }

    public function setArticle(?article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getOrigine(): ?origine
    {
        return $this->origine;
    }

    public function setOrigine(?origine $origine): self
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * @return Collection<int, Affectation>
     */
    public function getAffectations(): Collection
    {
        return $this->affectations;
    }

    public function addAffectation(Affectation $affectation): self
    {
        if (!$this->affectations->contains($affectation)) {
            $this->affectations[] = $affectation;
            $affectation->setExemplaire($this);
        }

        return $this;
    }

    public function removeAffectation(Affectation $affectation): self
    {
        if ($this->affectations->removeElement($affectation)) {
            // set the owning side to null (unless already changed)
            if ($affectation->getExemplaire() === $this) {
                $affectation->setExemplaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Inventaire>
     */
    public function getInventaires(): Collection
    {
        return $this->inventaires;
    }

    public function addInventaire(Inventaire $inventaire): self
    {
        if (!$this->inventaires->contains($inventaire)) {
            $this->inventaires[] = $inventaire;
            $inventaire->setExemplaire($this);
        }

        return $this;
    }

    public function removeInventaire(Inventaire $inventaire): self
    {
        if ($this->inventaires->removeElement($inventaire)) {
            // set the owning side to null (unless already changed)
            if ($inventaire->getExemplaire() === $this) {
                $inventaire->setExemplaire(null);
            }
        }

        return $this;
    }
    public function __toString(){
        
        return $this->codebar.' '.$this->getArticle()->getMarque().' '.$this->getArticle();
    }
}
