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
     * @ORM\Column(type="string", length=10)
     */
    private $coordinates;

    /**
     * @ORM\OneToMany(targetEntity=Wanted::class, mappedBy="position", orphanRemoval=true)
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

    public function getCoordinates(): ?string
    {
        return $this->coordinates;
    }

    public function setCoordinates(string $coordinates): self
    {
        $this->coordinates = $coordinates;

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
            $wanted->setPosition($this);
        }

        return $this;
    }

    public function removeWanted(Wanted $wanted): self
    {
        if ($this->wanteds->contains($wanted)) {
            $this->wanteds->removeElement($wanted);
            // set the owning side to null (unless already changed)
            if ($wanted->getPosition() === $this) {
                $wanted->setPosition(null);
            }
        }

        return $this;
    }
}
