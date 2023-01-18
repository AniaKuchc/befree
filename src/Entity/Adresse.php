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

    #[ORM\OneToMany(mappedBy: 'activiteAdresse', targetEntity: Activite::class)]
    private Collection $activites;

    #[ORM\OneToMany(mappedBy: 'adresse', targetEntity: Clients::class, orphanRemoval: true)]
    private Collection $clients;

    public function __construct()
    {
        $this->activites = new ArrayCollection();
        $this->clients = new ArrayCollection();
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

    public function __toString(): string
    {
        return $this->numeroAdresse . ' ' . $this->rueAdresse . ' ' . $this->codePostalAdresse . ' ' . $this->villeAdresse;
    }

    /**
     * @return Collection<int, Clients>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Clients $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->setAdresse($this);
        }

        return $this;
    }

    public function removeClient(Clients $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getAdresse() === $this) {
                $client->setAdresse($this);
            }
        }

        return $this;
    }
}
