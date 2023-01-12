<?php

namespace App\Entity;

use App\Repository\RandonneeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RandonneeRepository::class)]
class Randonnee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomRandonnee = null;

    #[ORM\Column(length: 255)]
    private ?string $villeRandonnee = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeRandonnee = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $geometryRandonnee = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $geopointRandonnee = null;

    #[ORM\ManyToOne(inversedBy: 'randonnees')]
    #[ORM\JoinColumn(nullable: true)]
    private ?CatalogueRandonnee $catalogueRandonnees = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRandonnee(): ?string
    {
        return $this->nomRandonnee;
    }

    public function setNomRandonnee(string $nomRandonnee): self
    {
        $this->nomRandonnee = $nomRandonnee;

        return $this;
    }

    public function getVilleRandonnee(): ?string
    {
        return $this->villeRandonnee;
    }

    public function setVilleRandonnee(string $villeRandonnee): self
    {
        $this->villeRandonnee = $villeRandonnee;

        return $this;
    }

    public function getTypeRandonnee(): ?string
    {
        return $this->typeRandonnee;
    }

    public function setTypeRandonnee(?string $typeRandonnee): self
    {
        $this->typeRandonnee = $typeRandonnee;

        return $this;
    }

    public function getGeometryRandonnee(): ?string
    {
        return $this->geometryRandonnee;
    }

    public function setGeometryRandonnee(string $geometryRandonnee): self
    {
        $this->geometryRandonnee = $geometryRandonnee;

        return $this;
    }

    public function getGeopointRandonnee(): ?string
    {
        return $this->geopointRandonnee;
    }

    public function setGeopointRandonnee(?string $geopointRandonnee): self
    {
        $this->geopointRandonnee = $geopointRandonnee;

        return $this;
    }

    public function getCatalogueRandonnees(): ?CatalogueRandonnee
    {
        return $this->catalogueRandonnees;
    }

    public function setCatalogueRandonnees(?CatalogueRandonnee $catalogueRandonnees): self
    {
        $this->catalogueRandonnees = $catalogueRandonnees;

        return $this;
    }
}
