<?php

namespace App\Entity;

use App\Repository\PhysiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PhysiqueRepository::class)
 */
class Physique
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Regex("/^[a-zA-Z0-9_]+$/")
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @Assert\Regex("/^[a-zA-Z0-9_]+$/")
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @Assert\Regex("/^[a-zA-Z0-9_]+$/")
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @Assert\Regex(
     * pattern="#^7[0,6,7,8]([0-9]){7}$#",
     * message="Votre telephone n'est pas valide"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @Assert\Regex("/^[a-zA-Z0-9_]+$/")
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @Assert\Regex("/^[a-zA-Z0-9_]+$/")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profession;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cni;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $salaire;

    /**
     * @ORM\ManyToOne(targetEntity=Moral::class, inversedBy="physiques", cascade={"persist"})
     */
    private $moral;

    /**
     * @ORM\OneToMany(targetEntity=Compte::class, mappedBy="physique")
     */
    private $comptes;

    public function __construct()
    {
        $this->comptes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getCni(): ?string
    {
        return $this->cni;
    }

    public function setCni(string $cni): self
    {
        $this->cni = $cni;

        return $this;
    }

    public function getSalaire(): ?string
    {
        return $this->salaire;
    }

    public function setSalaire(?string $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getMoral(): ?Moral
    {
        return $this->moral;
    }

    public function setMoral(?Moral $moral): self
    {
        $this->moral = $moral;

        return $this;
    }

    /**
     * @return Collection|Compte[]
     */
    public function getComptes(): Collection
    {
        return $this->comptes;
    }

    public function addCompte(Compte $compte): self
    {
        if (!$this->comptes->contains($compte)) {
            $this->comptes[] = $compte;
            $compte->setPhysique($this);
        }

        return $this;
    }

    public function removeCompte(Compte $compte): self
    {
        if ($this->comptes->contains($compte)) {
            $this->comptes->removeElement($compte);
            // set the owning side to null (unless already changed)
            if ($compte->getPhysique() === $this) {
                $compte->setPhysique(null);
            }
        }

        return $this;
    }
}
