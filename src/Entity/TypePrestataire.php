<?php

namespace App\Entity;

use App\Repository\TypePrestataireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypePrestataireRepository::class)]
class TypePrestataire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomTypePrestataire = null;

    #[ORM\ManyToMany(targetEntity: Prestataire::class, mappedBy: 'typePrestataires')]
    private Collection $prestataires;

    public function __construct()
    {
        $this->prestataires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypePrestataire(): ?string
    {
        return $this->nomTypePrestataire;
    }

    public function setNomTypePrestataire(string $nomTypePrestataire): self
    {
        $this->nomTypePrestataire = $nomTypePrestataire;

        return $this;
    }

    /**
     * @return Collection<int, Prestataire>
     */
    public function getPrestataires(): Collection
    {
        return $this->prestataires;
    }

    public function addPrestataire(Prestataire $prestataire): self
    {
        if (!$this->prestataires->contains($prestataire)) {
            $this->prestataires->add($prestataire);
            $prestataire->addTypePrestataire($this);
        }

        return $this;
    }

    public function removePrestataire(Prestataire $prestataire): self
    {
        if ($this->prestataires->removeElement($prestataire)) {
            $prestataire->removeTypePrestataire($this);
        }

        return $this;
    }
}
