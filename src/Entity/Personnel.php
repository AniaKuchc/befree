<?php

namespace App\Entity;

use App\Repository\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnelRepository::class)]
class Personnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $rolePersonnel = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPersonnel = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomPersonnel = null;

    #[ORM\Column(length: 255)]
    private ?string $mailPersonnel = null;

    #[ORM\Column(length: 255)]
    private ?string $motDePassePersonnel = null;

    #[ORM\ManyToMany(targetEntity: Activite::class, inversedBy: 'personnels')]
    private Collection $affectationPersonnelActivite;

    public function __construct()
    {
        $this->affectationPersonnelActivite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRolePersonnel(): ?string
    {
        return $this->rolePersonnel;
    }

    public function setRolePersonnel(string $rolePersonnel): self
    {
        $this->rolePersonnel = $rolePersonnel;

        return $this;
    }

    public function getNomPersonnel(): ?string
    {
        return $this->nomPersonnel;
    }

    public function setNomPersonnel(string $nomPersonnel): self
    {
        $this->nomPersonnel = $nomPersonnel;

        return $this;
    }

    public function getPrenomPersonnel(): ?string
    {
        return $this->prenomPersonnel;
    }

    public function setPrenomPersonnel(string $prenomPersonnel): self
    {
        $this->prenomPersonnel = $prenomPersonnel;

        return $this;
    }

    public function getMailPersonnel(): ?string
    {
        return $this->mailPersonnel;
    }

    public function setMailPersonnel(string $mailPersonnel): self
    {
        $this->mailPersonnel = $mailPersonnel;

        return $this;
    }

    public function getMotDePassePersonnel(): ?string
    {
        return $this->motDePassePersonnel;
    }

    public function setMotDePassePersonnel(string $motDePassePersonnel): self
    {
        $this->motDePassePersonnel = $motDePassePersonnel;

        return $this;
    }

    /**
     * @return Collection<int, Activite>
     */
    public function getAffectationPersonnelActivite(): Collection
    {
        return $this->affectationPersonnelActivite;
    }

    public function addAffectationPersonnelActivite(Activite $affectationPersonnelActivite): self
    {
        if (!$this->affectationPersonnelActivite->contains($affectationPersonnelActivite)) {
            $this->affectationPersonnelActivite->add($affectationPersonnelActivite);
        }

        return $this;
    }

    public function removeAffectationPersonnelActivite(Activite $affectationPersonnelActivite): self
    {
        $this->affectationPersonnelActivite->removeElement($affectationPersonnelActivite);

        return $this;
    }
}
