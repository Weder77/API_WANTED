<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AreaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AreaRepository::class)
 */
class Area
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
     * @ORM\OneToMany(targetEntity=Wanted::class, mappedBy="area", orphanRemoval=true)
     */
    private $wanteds;

    public function __construct()
    {
        $this->wanteds = new ArrayCollection();
    }

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

    /**
     * @return Collection|Wanted[]
     */
    public function getWanteds(): Collection
    {
        return $this->wanteds;
    }

    public function addWanted(Wanted $wanted): self
    {
        if (!$this->wanteds->contains($wanted)) {
            $this->wanteds[] = $wanted;
            $wanted->setArea($this);
        }

        return $this;
    }

    public function removeWanted(Wanted $wanted): self
    {
        if ($this->wanteds->contains($wanted)) {
            $this->wanteds->removeElement($wanted);
            // set the owning side to null (unless already changed)
            if ($wanted->getArea() === $this) {
                $wanted->setArea(null);
            }
        }

        return $this;
    }
}
