<?php

namespace App\Entity;

use App\Repository\CarburantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarburantRepository::class)
 */
class Carburant
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Vehicule::class, mappedBy="carburant")
     */
    private $annee;

    public function __construct()
    {
        $this->annee = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Vehicule[]
     */
    public function getAnnee(): Collection
    {
        return $this->annee;
    }

    public function addAnnee(Vehicule $annee): self
    {
        if (!$this->annee->contains($annee)) {
            $this->annee[] = $annee;
            $annee->setCarburant($this);
        }

        return $this;
    }

    public function removeAnnee(Vehicule $annee): self
    {
        if ($this->annee->removeElement($annee)) {
            // set the owning side to null (unless already changed)
            if ($annee->getCarburant() === $this) {
                $annee->setCarburant(null);
            }
        }

        return $this;
    }
    public function __toString() {
        return $this->nom;
    }
    
}
