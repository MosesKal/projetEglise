<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cellule
 *
 * @ORM\Table(name="cellule", indexes={@ORM\Index(name="membres_id", columns={"membres_id"})})
 * @ORM\Entity
 */
class Cellule
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NomCel", type="string", length=255, nullable=false)
     */
    private $nomcel;

    /**
     * @var string
     *
     * @ORM\Column(name="Commune", type="string", length=255, nullable=false)
     */
    private $commune;

    /**
     * @var \Membre
     *
     * @ORM\ManyToOne(targetEntity="Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="membres_id", referencedColumnName="id")
     * })
     */
    private $membres;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomcel(): ?string
    {
        return $this->nomcel;
    }

    public function setNomcel(string $nomcel): self
    {
        $this->nomcel = $nomcel;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    public function getMembres(): ?Membre
    {
        return $this->membres;
    }

    public function setMembres(?Membre $membres): self
    {
        $this->membres = $membres;

        return $this;
    }





}
