<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Adresse;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[Assert\NotBlank]
    private ?string $plainPassword = null;

    #[ORM\Column(length: 255)]
    private ?string $nomClient = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomClient = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephoneClient = null;

    #[ORM\OneToMany(mappedBy: 'clients', targetEntity: InscriptionClientsActivite::class, orphanRemoval: true)]
    private Collection $inscriptionClientsActivites;

    #[ORM\OneToMany(mappedBy: 'clients', targetEntity: SouscriptionClientOffre::class, orphanRemoval: true)]
    private Collection $souscriptionClientOffres;

    #[ORM\ManyToOne(inversedBy: 'clients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $adresse = null;
    // private Collection $adresse;

    public function __construct()
    {
        $this->inscriptionClientsActivites = new ArrayCollection();
        $this->souscriptionClientOffres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPlainPassword(): string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        $this->plainPassword = null;
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

    public function getTelephoneClient(): ?string
    {
        return $this->telephoneClient;
    }

    public function setTelephoneClient(?string $telephoneClient): self
    {
        $this->telephoneClient = $telephoneClient;

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
            $inscriptionClientsActivite->setClients($this);
        }

        return $this;
    }

    public function removeInscriptionClientsActivite(InscriptionClientsActivite $inscriptionClientsActivite): self
    {
        if ($this->inscriptionClientsActivites->removeElement($inscriptionClientsActivite)) {
            // set the owning side to null (unless already changed)
            if ($inscriptionClientsActivite->getClients() === $this) {
                $inscriptionClientsActivite->setClients(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SouscriptionClientOffre>
     */
    public function getSouscriptionClientOffres(): Collection
    {
        return $this->souscriptionClientOffres;
    }

    public function addSouscriptionClientOffre(SouscriptionClientOffre $souscriptionClientOffre): self
    {
        if (!$this->souscriptionClientOffres->contains($souscriptionClientOffre)) {
            $this->souscriptionClientOffres->add($souscriptionClientOffre);
            $souscriptionClientOffre->setClients($this);
        }

        return $this;
    }

    public function removeSouscriptionClientOffre(SouscriptionClientOffre $souscriptionClientOffre): self
    {
        if ($this->souscriptionClientOffres->removeElement($souscriptionClientOffre)) {
            // set the owning side to null (unless already changed)
            if ($souscriptionClientOffre->getClients() === $this) {
                $souscriptionClientOffre->setClients(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Adresse>
     */

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    // public function getAdresse(): Collection
    // {
    //     return $this->adresse;
    // }

    public function setAdresse(Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
