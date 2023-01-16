<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomOffre = null;

    #[ORM\Column]
    private ?float $prixOffre = null;

    #[ORM\OneToMany(mappedBy: 'offre', targetEntity: SoucriptionClientOffre::class, orphanRemoval: true)]
    private Collection $souscriptionOffre;

    #[ORM\OneToMany(mappedBy: 'activiteOffre', targetEntity: Activite::class, orphanRemoval: true)]
    private Collection $activites;

    public function __construct()
    {
        $this->souscriptionOffre = new ArrayCollection();
        $this->activites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOffre(): ?string
    {
        return $this->nomOffre;
    }

    public function setNomOffre(string $nomOffre): self
    {
        $this->nomOffre = $nomOffre;

        return $this;
    }

    public function getPrixOffre(): ?float
    {
        return $this->prixOffre;
    }

    public function setPrixOffre(float $prixOffre): self
    {
        $this->prixOffre = $prixOffre;

        return $this;
    }

    /**
     * @return Collection<int, SoucriptionClientOffre>
     */
    public function getSouscriptionOffre(): Collection
    {
        return $this->souscriptionOffre;
    }

    public function addSouscriptionOffre(SoucriptionClientOffre $souscriptionOffre): self
    {
        if (!$this->souscriptionOffre->contains($souscriptionOffre)) {
            $this->souscriptionOffre->add($souscriptionOffre);
            $souscriptionOffre->setOffre($this);
        }

        return $this;
    }

    public function removeSouscriptionOffre(SoucriptionClientOffre $souscriptionOffre): self
    {
        if ($this->souscriptionOffre->removeElement($souscriptionOffre)) {
            // set the owning side to null (unless already changed)
            if ($souscriptionOffre->getOffre() === $this) {
                $souscriptionOffre->setOffre(null);
            }
        }

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
            $activite->setActiviteOffre($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        if ($this->activites->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getActiviteOffre() === $this) {
                $activite->setActiviteOffre(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nomOffre . ' - ' . $this->prixOffre . ' €';
    }
}
