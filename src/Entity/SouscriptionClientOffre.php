<?php

namespace App\Entity;

use App\Repository\SouscriptionClientOffreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SouscriptionClientOffreRepository::class)]
class SouscriptionClientOffre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $finSouscription = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DebutSouscription = null;

    #[ORM\ManyToOne(inversedBy: 'souscriptionClientOffres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Offre $offres = null;

    #[ORM\ManyToOne(inversedBy: 'souscriptionClientOffres')]
    #[ORM\JoinColumn(nullable: false)]

    private ?Clients $clients = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFinSouscription(): ?\DateTimeInterface
    {
        return $this->finSouscription;
    }

    public function setFinSouscription(\DateTimeInterface $finSouscription): self
    {
        $this->finSouscription = $finSouscription;

        return $this;
    }

    public function getDebutSouscription(): ?\DateTimeInterface
    {
        return $this->DebutSouscription;
    }

    public function setDebutSouscription(\DateTimeInterface $DebutSouscription): self
    {
        $this->DebutSouscription = $DebutSouscription;

        return $this;
    }

    public function getOffres(): ?Offre
    {
        return $this->offres;
    }

    public function setOffres(?Offre $offres): self
    {
        $this->offres = $offres;

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
    public function __toString()
    {
        return 'id' . $this->id;
    }
}
