<?php

namespace App\Entity;

use App\Repository\PensionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PensionRepository::class)
 */
class Pension
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Finance::class, mappedBy="pension")
     */
    private $finances;

    public function __construct()
    {
        $this->finances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Finance[]
     */
    public function getFinances(): Collection
    {
        return $this->finances;
    }

    public function addFinance(Finance $finance): self
    {
        if (!$this->finances->contains($finance)) {
            $this->finances[] = $finance;
            $finance->addPension($this);
        }

        return $this;
    }

    public function removeFinance(Finance $finance): self
    {
        if ($this->finances->removeElement($finance)) {
            $finance->removePension($this);
        }

        return $this;
    }
}
