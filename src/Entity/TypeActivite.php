<?php

namespace App\Entity;

use App\Repository\TypeActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeActiviteRepository::class)]
class TypeActivite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomTypeActivite = null;

    #[ORM\OneToMany(mappedBy: 'ActiviteType', targetEntity: Activite::class, orphanRemoval: true)]
    private Collection $activites;

    public function __construct()
    {
        $this->activites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeActivite(): ?string
    {
        return $this->nomTypeActivite;
    }

    public function setNomTypeActivite(string $nomTypeActivite): self
    {
        $this->nomTypeActivite = $nomTypeActivite;

        return $this;
    }

    /**
     * @return Collection<int, Activite>
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(Activite $activite): self
    {
        if (!$this->activites->contains($activite)) {
            $this->activites->add($activite);
            $activite->setActiviteType($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        if ($this->activites->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getActiviteType() === $this) {
                $activite->setActiviteType(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nomTypeActivite;
    }
}
