<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MonsterRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ApiResource(
 *      collectionOperations={"get"},
 *      itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass=MonsterRepository::class)
 */

class Monster
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgUrl;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $level;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="integer")
     */
    private $pv;

    /**
     * @ORM\Column(type="integer")
     */
    private $pa;

    /**
     * @ORM\Column(type="integer")
     */
    private $pm;

    /**
     * @ORM\Column(type="integer")
     */
    private $res_terre;

    /**
     * @ORM\Column(type="integer")
     */
    private $res_air;

    /**
     * @ORM\Column(type="integer")
     */
    private $res_feu;

    /**
     * @ORM\Column(type="integer")
     */
    private $res_eau;

    /**
     * @ORM\Column(type="integer")
     */
    private $res_neutre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Area::class, inversedBy="monsters")
     * @ORM\JoinColumn(nullable=false)
     * @ApiProperty(iri="http://localhost:8000/area")
     */
    private $area;

    /**
     * @ORM\ManyToOne(targetEntity=Position::class, inversedBy="Monsters")
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

    public function getImgUrl(): ?string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(?string $imgUrl): self
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPv(): ?int
    {
        return $this->pv;
    }

    public function setPv(int $pv): self
    {
        $this->pv = $pv;

        return $this;
    }

    public function getPa(): ?int
    {
        return $this->pa;
    }

    public function setPa(int $pa): self
    {
        $this->pa = $pa;

        return $this;
    }

    public function getPm(): ?int
    {
        return $this->pm;
    }

    public function setPm(int $pm): self
    {
        $this->pm = $pm;

        return $this;
    }

    public function getResTerre(): ?int
    {
        return $this->res_terre;
    }

    public function setResTerre(int $res_terre): self
    {
        $this->res_terre = $res_terre;

        return $this;
    }

    public function getResAir(): ?int
    {
        return $this->res_air;
    }

    public function setResAir(int $res_air): self
    {
        $this->res_air = $res_air;

        return $this;
    }

    public function getResFeu(): ?int
    {
        return $this->res_feu;
    }

    public function setResFeu(int $res_feu): self
    {
        $this->res_feu = $res_feu;

        return $this;
    }

    public function getResEau(): ?int
    {
        return $this->res_eau;
    }

    public function setResEau(int $res_eau): self
    {
        $this->res_eau = $res_eau;

        return $this;
    }

    public function getResNeutre(): ?int
    {
        return $this->res_neutre;
    }

    public function setResNeutre(int $res_neutre): self
    {
        $this->res_neutre = $res_neutre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
