<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WantedRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=WantedRepository::class)
 */
class Wanted
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="integer")
     */
    private $vitality;

    /**
     * @ORM\Column(type="integer")
     */
    private $actionPoints;

    /**
     * @ORM\Column(type="integer")
     */
    private $movementPoints;

    /**
     * @ORM\Column(type="integer")
     */
    private $resistance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $urlImg;

    /**
     * @ORM\Column(type="text")
     */
    private $urlBestiaire;

    /**
     * @ORM\ManyToOne(targetEntity=Area::class, inversedBy="wanteds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $area;

    /**
     * @ORM\ManyToOne(targetEntity=Position::class, inversedBy="wanteds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $position;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getVitality(): ?int
    {
        return $this->vitality;
    }

    public function setVitality(int $vitality): self
    {
        $this->vitality = $vitality;

        return $this;
    }

    public function getActionPoints(): ?int
    {
        return $this->actionPoints;
    }

    public function setActionPoints(int $actionPoints): self
    {
        $this->actionPoints = $actionPoints;

        return $this;
    }

    public function getMovementPoints(): ?int
    {
        return $this->movementPoints;
    }

    public function setMovementPoints(int $movementPoints): self
    {
        $this->movementPoints = $movementPoints;

        return $this;
    }

    public function getResistance(): ?int
    {
        return $this->resistance;
    }

    public function setResistance(int $resistance): self
    {
        $this->resistance = $resistance;

        return $this;
    }

    public function getUrlImg(): ?string
    {
        return $this->urlImg;
    }

    public function setUrlImg(?string $urlImg): self
    {
        $this->urlImg = $urlImg;

        return $this;
    }

    public function getUrlBestiaire(): ?string
    {
        return $this->urlBestiaire;
    }

    public function setUrlBestiaire(string $urlBestiaire): self
    {
        $this->urlBestiaire = $urlBestiaire;

        return $this;
    }

    public function getArea(): ?Area
    {
        return $this->area;
    }

    public function setArea(?Area $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(?Position $position): self
    {
        $this->position = $position;

        return $this;
    }
}
