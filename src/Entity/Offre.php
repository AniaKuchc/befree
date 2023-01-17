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



    #[ORM\OneToMany(mappedBy: 'activiteOffre', targetEntity: Activite::class, orphanRemoval: true)]
    private Collection $activites;

    #[ORM\OneToMany(mappedBy: 'offres', targetEntity: SouscriptionClientOffre::class, orphanRemoval: true)]
    private Collection $souscriptionClientOffres;

    public function __construct()
    {

        $this->activites = new ArrayCollection();
        $this->souscriptionClientOffres = new ArrayCollection();
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

    /**
     * @return Collection<int, SouscriptionClientOffre>
     */
    public function getSouscriptionClientOffres(): Collection
    {
        return $this->souscriptionClientOffres;
    }

    public function addSouscriptionClientOffre(SouscriptionClientOffre $souscriptionClientOffre): self
    {
        if (!$this->souscriptionClientOffres->contains($souscriptionClientOffre)) {
            $this->souscriptionClientOffres->add($souscriptionClientOffre);
            $souscriptionClientOffre->setOffres($this);
        }

        return $this;
    }

    public function removeSouscriptionClientOffre(SouscriptionClientOffre $souscriptionClientOffre): self
    {
        if ($this->souscriptionClientOffres->removeElement($souscriptionClientOffre)) {
            // set the owning side to null (unless already changed)
            if ($souscriptionClientOffre->getOffres() === $this) {
                $souscriptionClientOffre->setOffres(null);
            }
        }

        return $this;
    }
}
