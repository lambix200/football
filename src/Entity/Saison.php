<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SaisonRepository::class)
 */
class Saison
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Annee;

    /**
     * @ORM\OneToOne(targetEntity=Statistiques::class, mappedBy="Saison", cascade={"persist", "remove"})
     */
    private $Statistiques;

    /**
     * @ORM\OneToMany(targetEntity=CompositionEquipe::class, mappedBy="saison", orphanRemoval=true)
     */
    private $compositionsEquipes;

    public function __construct()
    {
        $this->compositionsEquipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->Annee;
    }

    public function setAnnee(\DateTimeInterface $Annee): self
    {
        $this->Annee = $Annee;

        return $this;
    }

    public function getStatistiques(): ?Statistiques
    {
        return $this->Statistiques;
    }

    public function setStatistiques(Statistiques $Statistiques): self
    {
        // set the owning side of the relation if necessary
        if ($Statistiques->getSaison() !== $this) {
            $Statistiques->setSaison($this);
        }

        $this->Statistiques = $Statistiques;

        return $this;
    }

    /**
     * @return Collection|CompositionEquipe[]
     */
    public function getCompositionsEquipes(): Collection
    {
        return $this->compositionsEquipes;
    }

    public function addCompositionsEquipe(CompositionEquipe $compositionsEquipe): self
    {
        if (!$this->compositionsEquipes->contains($compositionsEquipe)) {
            $this->compositionsEquipes[] = $compositionsEquipe;
            $compositionsEquipe->setSaison($this);
        }

        return $this;
    }

    public function removeCompositionsEquipe(CompositionEquipe $compositionsEquipe): self
    {
        if ($this->compositionsEquipes->removeElement($compositionsEquipe)) {
            // set the owning side to null (unless already changed)
            if ($compositionsEquipe->getSaison() === $this) {
                $compositionsEquipe->setSaison(null);
            }
        }

        return $this;
    }
}
