<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipeRepository::class)
 */
class Equipe
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Niveau;

    /**
     * @ORM\OneToMany(targetEntity=CompositionEquipe::class, mappedBy="equipe", orphanRemoval=true)
     */
    private $compositionsEquipe;

    public function __construct()
    {
        $this->compositionsEquipe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNiveau(): ?string
    {
        return $this->Niveau;
    }

    public function setNiveau(string $Niveau): self
    {
        $this->Niveau = $Niveau;

        return $this;
    }

    /**
     * @return Collection|CompositionEquipe[]
     */
    public function getCompositionsEquipe(): Collection
    {
        return $this->compositionsEquipe;
    }

    public function addCompositionsEquipe(CompositionEquipe $compositionsEquipe): self
    {
        if (!$this->compositionsEquipe->contains($compositionsEquipe)) {
            $this->compositionsEquipe[] = $compositionsEquipe;
            $compositionsEquipe->setEquipe($this);
        }

        return $this;
    }

    public function removeCompositionsEquipe(CompositionEquipe $compositionsEquipe): self
    {
        if ($this->compositionsEquipe->removeElement($compositionsEquipe)) {
            // set the owning side to null (unless already changed)
            if ($compositionsEquipe->getEquipe() === $this) {
                $compositionsEquipe->setEquipe(null);
            }
        }

        return $this;
    }
}
