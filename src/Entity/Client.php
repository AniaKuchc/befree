<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomClient = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomClient = null;

    #[ORM\Column(length: 255)]
    private ?string $mailClient = null;

    #[ORM\Column(length: 255)]
    private ?string $motDePasseClient = null;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: SoucriptionClientOffre::class, orphanRemoval: true)]
    private Collection $souscriptionClient;

    #[ORM\ManyToOne(inversedBy: 'adresseClient')]
    #[ORM\JoinColumn(nullable: false)]
    // private ?Adresse $adresse = null;
    private Collection $adresse;

    #[ORM\OneToMany(mappedBy: 'inscriptionClient', targetEntity: InscriptionClientActivite::class, orphanRemoval: true)]
    private Collection $inscriptionClientActivites;

    public function __construct()
    {
        $this->souscriptionClient = new ArrayCollection();
        $this->inscriptionClientActivites = new ArrayCollection();
        $this->adresse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): self
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(string $prenomClient): self
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    public function getMailClient(): ?string
    {
        return $this->mailClient;
    }

    public function setMailClient(string $mailClient): self
    {
        $this->mailClient = $mailClient;

        return $this;
    }

    public function getMotDePasseClient(): ?string
    {
        return $this->motDePasseClient;
    }

    public function setMotDePasseClient(string $motDePasseClient): self
    {
        $this->motDePasseClient = $motDePasseClient;

        return $this;
    }

    /**
     * @return Collection<int, SoucriptionClientOffre>
     */
    public function getSouscriptionClient(): Collection
    {
        return $this->souscriptionClient;
    }

    public function addSouscriptionClient(SoucriptionClientOffre $souscriptionClient): self
    {
        if (!$this->souscriptionClient->contains($souscriptionClient)) {
            $this->souscriptionClient->add($souscriptionClient);
            $souscriptionClient->setClient($this);
        }

        return $this;
    }

    public function removeSouscriptionClient(SoucriptionClientOffre $souscriptionClient): self
    {
        if ($this->souscriptionClient->removeElement($souscriptionClient)) {
            // set the owning side to null (unless already changed)
            if ($souscriptionClient->getClient() === $this) {
                $souscriptionClient->setClient(null);
            }
        }

        return $this;
    }

    // public function getAdresse(): ?Adresse
    // {
    //     return $this->adresse;
    // }

    public function getAdresse(): Collection
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

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
            $inscriptionClientActivite->setInscriptionClient($this);
        }

        return $this;
    }

    public function removeInscriptionClientActivite(InscriptionClientActivite $inscriptionClientActivite): self
    {
        if ($this->inscriptionClientActivites->removeElement($inscriptionClientActivite)) {
            // set the owning side to null (unless already changed)
            if ($inscriptionClientActivite->getInscriptionClient() === $this) {
                $inscriptionClientActivite->setInscriptionClient(null);
            }
        }

        return $this;
    }
}
