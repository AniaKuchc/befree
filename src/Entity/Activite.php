<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActiviteRepository::class)]
class Activite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomActivite = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionActivite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateActivite = null;

    #[ORM\Column]
    private ?int $placeMaximum = null;

    #[ORM\Column]
    private ?bool $afficherActivite = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Prestataire $activitePrestataire = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeActivite $ActiviteType = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Randonnee $activiteRandonnee = null;

    #[ORM\ManyToMany(targetEntity: Personnel::class, mappedBy: 'affectationPersonnelActivite')]
    private Collection $personnels;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    private ?Adresse $activiteAdresse = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Offre $activiteOffre = null;

    #[ORM\OneToMany(mappedBy: 'inscriptionActivite', targetEntity: InscriptionClientActivite::class, orphanRemoval: true)]
    private Collection $inscriptionClientActivites;

    public function __construct()
    {
        $this->personnels = new ArrayCollection();
        $this->inscriptionClientActivites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomActivite(): ?string
    {
        return $this->nomActivite;
    }

    public function setNomActivite(string $nomActivite): self
    {
        $this->nomActivite = $nomActivite;

        return $this;
    }

    public function getDescriptionActivite(): ?string
    {
        return $this->descriptionActivite;
    }

    public function setDescriptionActivite(string $descriptionActivite): self
    {
        $this->descriptionActivite = $descriptionActivite;

        return $this;
    }

    public function getDateActivite(): ?\DateTimeInterface
    {
        return $this->dateActivite;
    }

    public function setDateActivite(\DateTimeInterface $dateActivite): self
    {
        $this->dateActivite = $dateActivite;

        return $this;
    }

    public function getPlaceMaximum(): ?int
    {
        return $this->placeMaximum;
    }

    public function setPlaceMaximum(int $placeMaximum): self
    {
        $this->placeMaximum = $placeMaximum;

        return $this;
    }

    public function isAfficherActivite(): ?bool
    {
        return $this->afficherActivite;
    }

    public function setAfficherActivite(bool $afficherActivite): self
    {
        $this->afficherActivite = $afficherActivite;

        return $this;
    }

    public function getActivitePrestataire(): ?Prestataire
    {
        return $this->activitePrestataire;
    }

    public function setActivitePrestataire(?Prestataire $activitePrestataire): self
    {
        $this->activitePrestataire = $activitePrestataire;

        return $this;
    }

    public function getActiviteType(): ?TypeActivite
    {
        return $this->ActiviteType;
    }

    public function setActiviteType(?TypeActivite $ActiviteType): self
    {
        $this->ActiviteType = $ActiviteType;

        return $this;
    }

    public function getActiviteRandonnee(): ?Randonnee
    {
        return $this->activiteRandonnee;
    }

    public function setActiviteRandonnee(?Randonnee $activiteRandonnee): self
    {
        $this->activiteRandonnee = $activiteRandonnee;

        return $this;
    }

    /**
     * @return Collection<int, Personnel>
     */
    public function getPersonnels(): Collection
    {
        return $this->personnels;
    }

    public function addPersonnel(Personnel $personnel): self
    {
        if (!$this->personnels->contains($personnel)) {
            $this->personnels->add($personnel);
            $personnel->addAffectationPersonnelActivite($this);
        }

        return $this;
    }

    public function removePersonnel(Personnel $personnel): self
    {
        if ($this->personnels->removeElement($personnel)) {
            $personnel->removeAffectationPersonnelActivite($this);
        }

        return $this;
    }

    public function getActiviteAdresse(): ?Adresse
    {
        return $this->activiteAdresse;
    }

    public function setActiviteAdresse(?Adresse $activiteAdresse): self
    {
        $this->activiteAdresse = $activiteAdresse;

        return $this;
    }

    public function getActiviteOffre(): ?Offre
    {
        return $this->activiteOffre;
    }

    public function setActiviteOffre(?Offre $activiteOffre): self
    {
        $this->activiteOffre = $activiteOffre;

        return $this;
    }

    /**
     * @return Collection<int, InscriptionClientActivite>
     */
    public function getInscriptionClientActivites(): Collection
    {
        return $this->inscriptionClientActivites;
    }

    public function addInscriptionClientActivite(InscriptionClientActivite $inscriptionClientActivite): self
    {
        if (!$this->inscriptionClientActivites->contains($inscriptionClientActivite)) {
            $this->inscriptionClientActivites->add($inscriptionClientActivite);
            $inscriptionClientActivite->setInscriptionActivite($this);
        }

        return $this;
    }

    public function removeInscriptionClientActivite(InscriptionClientActivite $inscriptionClientActivite): self
    {
        if ($this->inscriptionClientActivites->removeElement($inscriptionClientActivite)) {
            // set the owning side to null (unless already changed)
            if ($inscriptionClientActivite->getInscriptionActivite() === $this) {
                $inscriptionClientActivite->setInscriptionActivite(null);
            }
        }

        return $this;
    }
}
