<?php

namespace App\Entity;

use App\Repository\CompositionEquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompositionEquipeRepository::class)
 */
class CompositionEquipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Equipe::class, inversedBy="compositionsEquipe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipe;

    /**
     * @ORM\ManyToOne(targetEntity=Saison::class, inversedBy="compositionsEquipes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $saison;

    /**
     * @ORM\ManyToMany(targetEntity=Joueur::class, inversedBy="equipes")
     */
    private $joueurs;

    public function __construct()
    {
        $this->joueurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getSaison(): ?Saison
    {
        return $this->saison;
    }

    public function setSaison(?Saison $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * @return Collection|Joueur[]
     */
    public function getJoueurs(): Collection
    {
        return $this->joueurs;
    }

    public function addJoueur(Joueur $joueur): self
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs[] = $joueur;
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): self
    {
        $this->joueurs->removeElement($joueur);

        return $this;
    }
}
