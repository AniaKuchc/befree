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

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateActivite = null;

    #[ORM\Column]
    private ?int $placeMaximum = null;

    #[ORM\Column]
    private ?bool $afficherActivite = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Prestataire $activitePrestataire = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    #[ORM\JoinColumn(nullable: true)]
    private ?TypeActivite $ActiviteType = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Randonnee $activiteRandonnee = null;


    #[ORM\ManyToOne(inversedBy: 'activites', cascade: ["persist"])]
    private ?Adresse $activiteAdresse = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Offre $activiteOffre = null;

    #[ORM\ManyToMany(targetEntity: Personnels::class, mappedBy: 'activites')]
    private Collection $personnels;

    #[ORM\OneToMany(mappedBy: 'activites', targetEntity: InscriptionClientsActivite::class, orphanRemoval: true)]
    private Collection $inscriptionClientsActivites;

    #[ORM\Column(length: 255)]
    private ?string $activiteImage = null;


    public function __construct()
    {
        $this->personnels = new ArrayCollection();
        $this->inscriptionClientsActivites = new ArrayCollection();
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



    public function __toString(): string
    {
        return $this->nomActivite;
    }

    /**
     * @return Collection<int, Personnels>
     */
    public function getPersonnels(): Collection
    {
        return $this->personnels;
    }

    public function addPersonnel(Personnels $personnel): self
    {
        if (!$this->personnels->contains($personnel)) {
            $this->personnels->add($personnel);
            $personnel->addActivite($this);
        }

        return $this;
    }

    public function removePersonnel(Personnels $personnel): self
    {
        if ($this->personnels->removeElement($personnel)) {
            $personnel->removeActivite($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, InscriptionClientsActivite>
     */
    public function getInscriptionClientsActivites(): Collection
    {
        return $this->inscriptionClientsActivites;
    }

    public function addInscriptionClientsActivite(InscriptionClientsActivite $inscriptionClientsActivite): self
    {
        if (!$this->inscriptionClientsActivites->contains($inscriptionClientsActivite)) {
            $this->inscriptionClientsActivites->add($inscriptionClientsActivite);
            $inscriptionClientsActivite->setActivites($this);
        }

        return $this;
    }

    public function removeInscriptionClientsActivite(InscriptionClientsActivite $inscriptionClientsActivite): self
    {
        if ($this->inscriptionClientsActivites->removeElement($inscriptionClientsActivite)) {
            // set the owning side to null (unless already changed)
            if ($inscriptionClientsActivite->getActivites() === $this) {
                $inscriptionClientsActivite->setActivites(null);
            }
        }

        return $this;
    }

    public function getActiviteImage(): ?string
    {
        return $this->activiteImage;
    }

    public function setActiviteImage(string $activiteImage): self
    {
        $this->activiteImage = $activiteImage;

        return $this;
    }
}
