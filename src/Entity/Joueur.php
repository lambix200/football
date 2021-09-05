<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JoueurRepository::class)
 */
class Joueur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $DateDeNaissance;

    /**
     * @ORM\OneToOne(targetEntity=Statistiques::class, mappedBy="Joueur", cascade={"persist", "remove"})
     */
    private $Statistiques;

    /**
     * @ORM\ManyToMany(targetEntity=CompositionEquipe::class, mappedBy="joueurs")
     */
    private $equipes;

    public function __construct()
    {
        $this->equipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->DateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $DateDeNaissance): self
    {
        $this->DateDeNaissance = $DateDeNaissance;

        return $this;
    }

    public function getStatistiques(): ?Statistiques
    {
        return $this->Statistiques;
    }

    public function setStatistiques(Statistiques $Statistiques): self
    {
        // set the owning side of the relation if necessary
        if ($Statistiques->getJoueur() !== $this) {
            $Statistiques->setJoueur($this);
        }

        $this->Statistiques = $Statistiques;

        return $this;
    }

    /**
     * @return Collection|CompositionEquipe[]
     */
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    public function addEquipe(CompositionEquipe $equipe): self
    {
        if (!$this->equipes->contains($equipe)) {
            $this->equipes[] = $equipe;
            $equipe->addJoueur($this);
        }

        return $this;
    }

    public function removeEquipe(CompositionEquipe $equipe): self
    {
        if ($this->equipes->removeElement($equipe)) {
            $equipe->removeJoueur($this);
        }

        return $this;
    }
}
