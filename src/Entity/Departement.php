<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement", indexes={@ORM\Index(name="membres_id", columns={"membres_id"})})
 * @ORM\Entity
 */
class Departement
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
     * @ORM\Column(name="NomDept", type="string", length=255, nullable=false)
     */
    private $nomdept;

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

    public function getNomdept(): ?string
    {
        return $this->nomdept;
    }

    public function setNomdept(string $nomdept): self
    {
        $this->nomdept = $nomdept;

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
