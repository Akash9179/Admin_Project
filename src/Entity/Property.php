<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 */
class Property
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=RentalCommercial::class, inversedBy="properties")
     */
    private $rental_commercial;

    /**
     * @ORM\ManyToMany(targetEntity=ResidentialLand::class, inversedBy="properties")
     */
    private $residential_land;

    public function __construct()
    {
        $this->rental_commercial = new ArrayCollection();
        $this->residential_land = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|RentalCommercial[]
     */
    public function getRentalCommercial(): Collection
    {
        return $this->rental_commercial;
    }

    public function addRentalCommercial(RentalCommercial $rentalCommercial): self
    {
        if (!$this->rental_commercial->contains($rentalCommercial)) {
            $this->rental_commercial[] = $rentalCommercial;
        }

        return $this;
    }

    public function removeRentalCommercial(RentalCommercial $rentalCommercial): self
    {
        $this->rental_commercial->removeElement($rentalCommercial);

        return $this;
    }

    /**
     * @return Collection|ResidentialLand[]
     */
    public function getResidentialLand(): Collection
    {
        return $this->residential_land;
    }

    public function addResidentialLand(ResidentialLand $residentialLand): self
    {
        if (!$this->residential_land->contains($residentialLand)) {
            $this->residential_land[] = $residentialLand;
        }

        return $this;
    }

    public function removeResidentialLand(ResidentialLand $residentialLand): self
    {
        $this->residential_land->removeElement($residentialLand);

        return $this;
    }
}
