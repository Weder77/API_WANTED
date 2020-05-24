<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PositionRepository::class)
 */
class Position
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=65)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Monster::class, mappedBy="position", orphanRemoval=true)
     */
    private $Monsters;

    public function __construct()
    {
        $this->Monsters = new ArrayCollection();
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
     * @return Collection|Monster[]
     */
    public function getMonsters(): Collection
    {
        return $this->Monsters;
    }

    public function addMonster(Monster $monster): self
    {
        if (!$this->Monsters->contains($monster)) {
            $this->Monsters[] = $monster;
            $monster->setPosition($this);
        }

        return $this;
    }

    public function removeMonster(Monster $monster): self
    {
        if ($this->Monsters->contains($monster)) {
            $this->Monsters->removeElement($monster);
            // set the owning side to null (unless already changed)
            if ($monster->getPosition() === $this) {
                $monster->setPosition(null);
            }
        }

        return $this;
    }
}
