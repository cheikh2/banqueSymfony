<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numAgence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numCompte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rib;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $montant;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=Moral::class, inversedBy="comptes")
     */
    private $moral;

    /**
     * @ORM\ManyToOne(targetEntity=Physique::class, inversedBy="comptes")
     */
    private $physique;

    /**
     * @ORM\ManyToMany(targetEntity=TypeCompte::class, inversedBy="comptes")
     */
    private $typecomptes;

    public function __construct()
    {
        $this->typecomptes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumAgence(): ?string
    {
        return $this->numAgence;
    }

    public function setNumAgence(string $numAgence): self
    {
        $this->numAgence = $numAgence;

        return $this;
    }

    public function getNumCompte(): ?string
    {
        return $this->numCompte;
    }

    public function setNumCompte(string $numCompte): self
    {
        $this->numCompte = $numCompte;

        return $this;
    }

    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(string $rib): self
    {
        $this->rib = $rib;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

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

    public function getPhysique(): ?Physique
    {
        return $this->physique;
    }

    public function setPhysique(?Physique $physique): self
    {
        $this->physique = $physique;

        return $this;
    }

    /**
     * @return Collection|TypeCompte[]
     */
    public function getTypecomptes(): Collection
    {
        return $this->typecomptes;
    }

    public function addTypecompte(TypeCompte $typecompte): self
    {
        if (!$this->typecomptes->contains($typecompte)) {
            $this->typecomptes[] = $typecompte;
        }

        return $this;
    }

    public function removeTypecompte(TypeCompte $typecompte): self
    {
        if ($this->typecomptes->contains($typecompte)) {
            $this->typecomptes->removeElement($typecompte);
        }

        return $this;
    }
}
