<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    private $filename;


    /**
     * @var File|null
     * @Vich\UploadableField(mapping="vehicules", fileNameProperty="filename")
     */
    private $imageFile;

    
      /**
     * @ORM\Column(type="datetime", nullable=true)
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carburant;

  
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imatriculation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $porte;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $puissance;

    
     /**
     * @ORM\Column(type="string", length=255, nullable=true)
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

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $options;



    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $revision;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $annonce;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nouvelleimat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prixachat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prixvente;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $garantie;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="vehicule")
     */
    private $clients;

    public function __construct()
    {
        $this->vehicule = new ArrayCollection();
        $this->created_at = new \DateTime("now", new \DateTimeZone('Europe/Paris'));
        $this->clients = new ArrayCollection();
    }

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

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(?string $carburant): self
    {
        $this->carburant = $carburant;

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

  

    public function getBoite(): ?string
    {
        return $this->boite;
    }

    public function setBoite(?string $boite): self
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getOptions(): ?string
    {
        return $this->options;
    }

    public function setOptions(?string $options): self
    {
        $this->options = $options;

        return $this;
    }

 

    public function getRevision(): ?string
    {
        return $this->revision;
    }

    public function setRevision(?string $revision): self
    {
        $this->revision = $revision;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getAnnonce(): ?string
    {
        return $this->annonce;
    }

    public function setAnnonce(?string $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }

    public function getNouvelleimat(): ?string
    {
        return $this->nouvelleimat;
    }

    public function setNouvelleimat(?string $nouvelleimat): self
    {
        $this->nouvelleimat = $nouvelleimat;

        return $this;
    }

    public function getPrixachat(): ?int
    {
        return $this->prixachat;
    }

    public function setPrixachat(?int $prixachat): self
    {
        $this->prixachat = $prixachat;

        return $this;
    }

    public function getPrixvente(): ?int
    {
        return $this->prixvente;
    }

    public function setPrixvente(?int $prixvente): self
    {
        $this->prixvente = $prixvente;

        return $this;
    }

    public function getGarantie(): ?string
    {
        return $this->garantie;
    }

    public function setGarantie(?string $garantie): self
    {
        $this->garantie = $garantie;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setVehicule($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getVehicule() === $this) {
                $client->setVehicule(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->imatriculation;
    }
}
