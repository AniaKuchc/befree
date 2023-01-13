<?php

namespace App\Entity;

use App\Repository\SoucriptionClientOffreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoucriptionClientOffreRepository::class)]
class SoucriptionClientOffre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $debutSouscription = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $finSouscription = null;

    #[ORM\ManyToOne(inversedBy: 'souscriptionOffre')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Offre $offre = null;

    #[ORM\ManyToOne(inversedBy: 'souscriptionClient')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDebutSouscription(): ?\DateTimeInterface
    {
        return $this->debutSouscription;
    }

    public function setDebutSouscription(\DateTimeInterface $debutSouscription): self
    {
        $this->debutSouscription = $debutSouscription;

        return $this;
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

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): self
    {
        $this->offre = $offre;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
