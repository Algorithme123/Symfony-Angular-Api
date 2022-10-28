<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['lire:article','lire:categorie'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['lire:article','lire:categorie'])]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    #[Groups(['lire:article','lire:categorie'])]
    private ?string $libelle = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['lire:article','lire:categorie'])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(['lire:article','lire:categorie'])]
    private ?float $prix = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['lire:article','lire:categorie'])]
    private ?int $quantite = null;

    #[ORM\Column(length: 255)]
    #[Groups(['lire:article','lire:categorie'])]
    private ?string $image = null;

    // #[Groups(['lire:article'])]
    // #[Groups(['lire:categorie'])]
    // #[Groups(['lire:article'])]
    #[ORM\ManyToOne(inversedBy: 'article')]
    private ?Categorie $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

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

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
