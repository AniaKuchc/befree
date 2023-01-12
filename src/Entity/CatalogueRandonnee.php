<?php

namespace App\Entity;

use App\Repository\CatalogueRandonneeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatalogueRandonneeRepository::class)]
class CatalogueRandonnee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateProposedRando = null;

    #[ORM\OneToMany(mappedBy: 'catalogueRandonnees', targetEntity: Randonnee::class, orphanRemoval: true)]
    private Collection $randonnees;

    public function __construct()
    {
        $this->randonnees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateProposedRando(): ?\DateTimeImmutable
    {
        return $this->dateProposedRando;
    }

    public function setDateProposedRando(\DateTimeImmutable $dateProposedRando): self
    {
        $this->dateProposedRando = $dateProposedRando;

        return $this;
    }

    /**
     * @return Collection<int, Randonnee>
     */
    public function getRandonnees(): Collection
    {
        return $this->randonnees;
    }

    public function addRandonnee(Randonnee $randonnee): self
    {
        if (!$this->randonnees->contains($randonnee)) {
            $this->randonnees->add($randonnee);
            $randonnee->setCatalogueRandonnees($this);
        }

        return $this;
    }

    public function removeRandonnee(Randonnee $randonnee): self
    {
        if ($this->randonnees->removeElement($randonnee)) {
            // set the owning side to null (unless already changed)
            if ($randonnee->getCatalogueRandonnees() === $this) {
                $randonnee->setCatalogueRandonnees(null);
            }
        }

        return $this;
    }
}
