<?php

namespace App\Entity;

use App\Repository\InvestmentShareRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvestmentShareRepository::class)
 */
class InvestmentShare
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Investment::class, inversedBy="investmentShares")
     */
    private $investment;

    public function __construct()
    {
        $this->investment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Investment[]
     */
    public function getInvestment(): Collection
    {
        return $this->investment;
    }

    public function addInvestment(Investment $investment): self
    {
        if (!$this->investment->contains($investment)) {
            $this->investment[] = $investment;
        }

        return $this;
    }

    public function removeInvestment(Investment $investment): self
    {
        $this->investment->removeElement($investment);

        return $this;
    }
}
