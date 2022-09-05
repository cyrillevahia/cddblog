<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PostRepository;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups('post:read')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups('post:read')]
    private $theme;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups('post:read')]
    private $titre;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Groups('post:read')]
    private $chapo;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups('post:read')]
    private $post;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Groups('post:read')]
    private $createdAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updatedAt;

    #[ORM\ManyToOne(targetEntity: Rubrique::class, inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('post:read')]
    private $rubrique;


    #[ORM\Column(type: 'string', length: 255)]
    #[Groups('post:read')]
    private $image;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[Groups('post:read')]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getChapo(): ?string
    {
        return $this->chapo;
    }

    public function setChapo(?string $chapo): self
    {
        $this->chapo = $chapo;

        return $this;
    }

    public function getPost(): ?string
    {
        return $this->post;
    }

    public function setPost(string $post): self
    {
        $this->post = $post;

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

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRubrique(): ?rubrique
    {
        return $this->rubrique;
    }

    public function setRubrique(?rubrique $rubrique): self
    {
        $this->rubrique = $rubrique;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
    public function __toString()
    {
        return $this->titre;
    }
}
