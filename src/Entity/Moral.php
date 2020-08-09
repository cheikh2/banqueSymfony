<?php

namespace App\Entity;

use App\Repository\MoralRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MoralRepository::class)
 */
class Moral
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
    private $nomEmpl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ninea;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $raisonSocial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressEmpl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmpl(): ?string
    {
        return $this->nomEmpl;
    }

    public function setNomEmpl(string $nomEmpl): self
    {
        $this->nomEmpl = $nomEmpl;

        return $this;
    }

    public function getNinea(): ?string
    {
        return $this->ninea;
    }

    public function setNinea(string $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getRc(): ?string
    {
        return $this->rc;
    }

    public function setRc(string $rc): self
    {
        $this->rc = $rc;

        return $this;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(?string $raisonSocial): self
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    public function getAdressEmpl(): ?string
    {
        return $this->adressEmpl;
    }

    public function setAdressEmpl(string $adressEmpl): self
    {
        $this->adressEmpl = $adressEmpl;

        return $this;
    }
}
