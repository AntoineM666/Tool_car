<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=VehiculeRepository::class)
 * @Vich\Uploadable
 */
class Vehicule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;




    /**
     * @var string|null
     * @ORM\Column(type="string",length=255)
     */
    private $filename;


    /**
     * @var File|null
     * @Vich\UploadableField(mapping="vehicules", fileNameProperty="filename")
     */
    private $imageFile;

    
      /**
     * @ORM\Column(type="datetime")
     * @var \Datetime|null
     */
    private $updated_at;





    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometrage;

    /**
     * @ORM\ManyToOne(targetEntity=carburant::class, inversedBy="annee")
     * @ORM\JoinColumn(nullable=false)
     */
    private $carburant;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imatriculation;

    /**
     * @ORM\Column(type="integer")
     */
    private $porte;

    /**
     * @ORM\Column(type="integer")
     */
    private $puissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=Boiteav::class, inversedBy="vehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $boite;

    /**
     * @ORM\Column(type="date")
     */
    private $miseencirculation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getCarburant(): ?carburant
    {
        return $this->carburant;
    }

    public function setCarburant(?carburant $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getImatriculation(): ?string
    {
        return $this->imatriculation;
    }

    public function setImatriculation(string $imatriculation): self
    {
        $this->imatriculation = $imatriculation;

        return $this;
    }

   

    public function getPorte(): ?int
    {
        return $this->porte;
    }

    public function setPorte(int $porte): self
    {
        $this->porte = $porte;

        return $this;
    }

    public function getPuissance(): ?int
    {
        return $this->puissance;
    }

    public function setPuissance(int $puissance): self
    {
        $this->puissance = $puissance;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getBoite(): ?Boiteav
    {
        return $this->boite;
    }

    public function setBoite(?Boiteav $boite): self
    {
        $this->boite = $boite;

        return $this;
    }

    public function getMiseencirculation(): ?\DateTimeInterface
    {
        return $this->miseencirculation;
    }

    public function setMiseencirculation(\DateTimeInterface $miseencirculation): self
    {
        $this->miseencirculation = $miseencirculation;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    
    /**
     * Get the value of imageFile
     *
     * @return  File
     */ 
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set the value of imageFile
     *
     * @param  File  $imageFile
     *
     * @return  self
     */ 
    public function setImageFile(File $imageFile)
    {
        $this->imageFile = $imageFile;
        if($this->imageFile instanceof UploadedFile){
            $this->updated_at = new \DateTime('now');
        }

        return $this;
    }

    /**
     * Get the value of filename
     *
     * @return  string|null
     */ 
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set the value of filename
     *
     * @param  string|null  $filename
     *
     * @return  self
     */ 
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
