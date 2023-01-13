<?php

namespace App\Entity;

use App\Repository\InscriptionClientActiviteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionClientActiviteRepository::class)]
class InscriptionClientActivite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptionClientActivites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $inscriptionClient = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptionClientActivites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Activite $inscriptionActivite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getInscriptionClient(): ?Client
    {
        return $this->inscriptionClient;
    }

    public function setInscriptionClient(?Client $inscriptionClient): self
    {
        $this->inscriptionClient = $inscriptionClient;

        return $this;
    }

    public function getInscriptionActivite(): ?Activite
    {
        return $this->inscriptionActivite;
    }

    public function setInscriptionActivite(?Activite $inscriptionActivite): self
    {
        $this->inscriptionActivite = $inscriptionActivite;

        return $this;
    }
}
