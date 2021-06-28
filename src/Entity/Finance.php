<?php

namespace App\Entity;

use App\Repository\FinanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FinanceRepository::class)
 */
class Finance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Cash::class, inversedBy="finances")
     */
    private $cash;

    /**
     * @ORM\ManyToMany(targetEntity=Pension::class, inversedBy="finances")
     */
    private $pension;

    public function __construct()
    {
        $this->cash = new ArrayCollection();
        $this->pension = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Cash[]
     */
    public function getCash(): Collection
    {
        return $this->cash;
    }

    public function addCash(Cash $cash): self
    {
        if (!$this->cash->contains($cash)) {
            $this->cash[] = $cash;
        }

        return $this;
    }

    public function removeCash(Cash $cash): self
    {
        $this->cash->removeElement($cash);

        return $this;
    }

    /**
     * @return Collection|Pension[]
     */
    public function getPension(): Collection
    {
        return $this->pension;
    }

    public function addPension(Pension $pension): self
    {
        if (!$this->pension->contains($pension)) {
            $this->pension[] = $pension;
        }

        return $this;
    }

    public function removePension(Pension $pension): self
    {
        $this->pension->removeElement($pension);

        return $this;
    }
}
