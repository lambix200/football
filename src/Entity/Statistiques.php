<?php

namespace App\Entity;

use App\Repository\StatistiquesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatistiquesRepository::class)
 */
class Statistiques
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Matchs;

    /**
     * @ORM\Column(type="integer")
     */
    private $minutes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $PassesDecisives;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Buts;

    /**
     * @ORM\OneToOne(targetEntity=Joueur::class, inversedBy="Statistiques", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Joueur;

    /**
     * @ORM\OneToOne(targetEntity=Saison::class, inversedBy="Statistiques", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Saison;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatchs(): ?int
    {
        return $this->Matchs;
    }

    public function setMatchs(?int $Matchs): self
    {
        $this->Matchs = $Matchs;

        return $this;
    }

    public function getMinutes(): ?int
    {
        return $this->minutes;
    }

    public function setMinutes(int $minutes): self
    {
        $this->minutes = $minutes;

        return $this;
    }

    public function getPassesDecisives(): ?int
    {
        return $this->PassesDecisives;
    }

    public function setPassesDecisives(?int $PassesDecisives): self
    {
        $this->PassesDecisives = $PassesDecisives;

        return $this;
    }

    public function getButs(): ?int
    {
        return $this->Buts;
    }

    public function setButs(?int $Buts): self
    {
        $this->Buts = $Buts;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->Joueur;
    }

    public function setJoueur(Joueur $Joueur): self
    {
        $this->Joueur = $Joueur;

        return $this;
    }

    public function getSaison(): ?Saison
    {
        return $this->Saison;
    }

    public function setSaison(Saison $Saison): self
    {
        $this->Saison = $Saison;

        return $this;
    }
}
