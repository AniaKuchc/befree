<?php

namespace App\Entity;

use App\Repository\InscriptionClientsActiviteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionClientsActiviteRepository::class)]
class InscriptionClientsActivite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $inscriptionActiviteClient = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptionClientsActivites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clients $clients = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptionClientsActivites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Activite $activites = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInscriptionActiviteClient(): ?\DateTimeInterface
    {
        return $this->inscriptionActiviteClient;
    }

    public function setInscriptionActiviteClient(\DateTimeInterface $inscriptionActiviteClient): self
    {
        $this->inscriptionActiviteClient = $inscriptionActiviteClient;

        return $this;
    }

    public function getClients(): ?Clients
    {
        return $this->clients;
    }

    public function setClients(?Clients $clients): self
    {
        $this->clients = $clients;

        return $this;
    }

    public function getActivites(): ?Activite
    {
        return $this->activites;
    }

    public function setActivites(?Activite $activites): self
    {
        $this->activites = $activites;

        return $this;
    }
}
