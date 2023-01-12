<?php

namespace App\Entity;

use App\Repository\PrestataireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestataireRepository::class)]
class Prestataire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPrestataire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptionPrestataire = null;

    #[ORM\Column(nullable: true)]
    private ?int $inseePrestataire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $villePrestataire = null;

    #[ORM\Column(length: 255)]
    private ?string $geopointPrestataire = null;

    #[ORM\ManyToMany(targetEntity: TypePrestataire::class, inversedBy: 'prestataires')]
    private Collection $typePrestataires;

    public function __construct()
    {
        $this->typePrestataires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrestataire(): ?string
    {
        return $this->nomPrestataire;
    }

    public function setNomPrestataire(string $nomPrestataire): self
    {
        $this->nomPrestataire = $nomPrestataire;

        return $this;
    }

    public function getDescriptionPrestataire(): ?string
    {
        return $this->descriptionPrestataire;
    }

    public function setDescriptionPrestataire(?string $descriptionPrestataire): self
    {
        $this->descriptionPrestataire = $descriptionPrestataire;

        return $this;
    }

    public function getInseePrestataire(): ?int
    {
        return $this->inseePrestataire;
    }

    public function setInseePrestataire(?int $inseePrestataire): self
    {
        $this->inseePrestataire = $inseePrestataire;

        return $this;
    }

    public function getVillePrestataire(): ?string
    {
        return $this->villePrestataire;
    }

    public function setVillePrestataire(?string $villePrestataire): self
    {
        $this->villePrestataire = $villePrestataire;

        return $this;
    }

    public function getGeopointPrestataire(): ?string
    {
        return $this->geopointPrestataire;
    }

    public function setGeopointPrestataire(string $geopointPrestataire): self
    {
        $this->geopointPrestataire = $geopointPrestataire;

        return $this;
    }

    /**
     * @return Collection<int, TypePrestataire>
     */
    public function getTypePrestataires(): Collection
    {
        return $this->typePrestataires;
    }

    public function addTypePrestataire(TypePrestataire $typePrestataire): self
    {
        if (!$this->typePrestataires->contains($typePrestataire)) {
            $this->typePrestataires->add($typePrestataire);
        }

        return $this;
    }

    public function removeTypePrestataire(TypePrestataire $typePrestataire): self
    {
        $this->typePrestataires->removeElement($typePrestataire);

        return $this;
    }
}
