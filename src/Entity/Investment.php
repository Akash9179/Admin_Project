<?php

namespace App\Entity;

use App\Repository\InvestmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvestmentRepository::class)
 */
class Investment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=InvestmentShare::class, mappedBy="investment")
     */
    private $investmentShares;

    /**
     * @ORM\ManyToMany(targetEntity=InvestmentAccount::class, mappedBy="investment")
     */
    private $investmentAccounts;

    /**
     * @ORM\ManyToMany(targetEntity=InvestmentPension::class, mappedBy="investment")
     */
    private $investmentPensions;

    public function __construct()
    {
        $this->investmentShares = new ArrayCollection();
        $this->investmentAccounts = new ArrayCollection();
        $this->investmentPensions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|InvestmentShare[]
     */
    public function getInvestmentShares(): Collection
    {
        return $this->investmentShares;
    }

    public function addInvestmentShare(InvestmentShare $investmentShare): self
    {
        if (!$this->investmentShares->contains($investmentShare)) {
            $this->investmentShares[] = $investmentShare;
            $investmentShare->addInvestment($this);
        }

        return $this;
    }

    public function removeInvestmentShare(InvestmentShare $investmentShare): self
    {
        if ($this->investmentShares->removeElement($investmentShare)) {
            $investmentShare->removeInvestment($this);
        }

        return $this;
    }

    /**
     * @return Collection|InvestmentAccount[]
     */
    public function getInvestmentAccounts(): Collection
    {
        return $this->investmentAccounts;
    }

    public function addInvestmentAccount(InvestmentAccount $investmentAccount): self
    {
        if (!$this->investmentAccounts->contains($investmentAccount)) {
            $this->investmentAccounts[] = $investmentAccount;
            $investmentAccount->addInvestment($this);
        }

        return $this;
    }

    public function removeInvestmentAccount(InvestmentAccount $investmentAccount): self
    {
        if ($this->investmentAccounts->removeElement($investmentAccount)) {
            $investmentAccount->removeInvestment($this);
        }

        return $this;
    }

    /**
     * @return Collection|InvestmentPension[]
     */
    public function getInvestmentPensions(): Collection
    {
        return $this->investmentPensions;
    }

    public function addInvestmentPension(InvestmentPension $investmentPension): self
    {
        if (!$this->investmentPensions->contains($investmentPension)) {
            $this->investmentPensions[] = $investmentPension;
            $investmentPension->addInvestment($this);
        }

        return $this;
    }

    public function removeInvestmentPension(InvestmentPension $investmentPension): self
    {
        if ($this->investmentPensions->removeElement($investmentPension)) {
            $investmentPension->removeInvestment($this);
        }

        return $this;
    }
}
