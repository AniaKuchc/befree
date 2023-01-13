<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numeroAdresse = null;

    #[ORM\Column(length: 255)]
    private ?string $rueAdresse = null;

    #[ORM\Column]
    private ?int $codePostalAdresse = null;

    #[ORM\Column(length: 255)]
    private ?string $villeAdresse = null;

    #[ORM\OneToMany(mappedBy: 'adresse', targetEntity: Client::class, orphanRemoval: true)]
    private Collection $adresseClient;

    #[ORM\OneToMany(mappedBy: 'activiteAdresse', targetEntity: Activite::class)]
    private Collection $activites;

    public function __construct()
    {
        $this->adresseClient = new ArrayCollection();
        $this->activites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroAdresse(): ?string
    {
        return $this->numeroAdresse;
    }

    public function setNumeroAdresse(string $numeroAdresse): self
    {
        $this->numeroAdresse = $numeroAdresse;

        return $this;
    }

    public function getRueAdresse(): ?string
    {
        return $this->rueAdresse;
    }

    public function setRueAdresse(string $rueAdresse): self
    {
        $this->rueAdresse = $rueAdresse;

        return $this;
    }

    public function getCodePostalAdresse(): ?int
    {
        return $this->codePostalAdresse;
    }

    public function setCodePostalAdresse(int $codePostalAdresse): self
    {
        $this->codePostalAdresse = $codePostalAdresse;

        return $this;
    }

    public function getVilleAdresse(): ?string
    {
        return $this->villeAdresse;
    }

    public function setVilleAdresse(string $villeAdresse): self
    {
        $this->villeAdresse = $villeAdresse;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getAdresseClient(): Collection
    {
        return $this->adresseClient;
    }

    public function addAdresseClient(Client $adresseClient): self
    {
        if (!$this->adresseClient->contains($adresseClient)) {
            $this->adresseClient->add($adresseClient);
            $adresseClient->setAdresse($this);
        }

        return $this;
    }

    public function removeAdresseClient(Client $adresseClient): self
    {
        if ($this->adresseClient->removeElement($adresseClient)) {
            // set the owning side to null (unless already changed)
            if ($adresseClient->getAdresse() === $this) {
                $adresseClient->setAdresse(null);
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
            $activite->setActiviteAdresse($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        if ($this->activites->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getActiviteAdresse() === $this) {
                $activite->setActiviteAdresse(null);
            }
        }

        return $this;
    }
}
