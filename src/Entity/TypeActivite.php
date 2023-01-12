<?php

namespace App\Entity;

use App\Repository\TypeActiviteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeActiviteRepository::class)]
class TypeActivite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomTypeActivite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeActivite(): ?string
    {
        return $this->nomTypeActivite;
    }

    public function setNomTypeActivite(string $nomTypeActivite): self
    {
        $this->nomTypeActivite = $nomTypeActivite;

        return $this;
    }
}
