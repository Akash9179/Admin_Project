<?php

namespace App\Entity;

use App\Repository\UserProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserProfileRepository::class)
 */
class UserProfile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Domicile::class, mappedBy="userProfile",cascade={"persist"})
     */
    private $domicile;

    /**
     * @ORM\OneToMany(targetEntity=Family::class, mappedBy="userProfile",cascade={"persist"})
     */
    private $family;

    /**
     * @ORM\ManyToOne(targetEntity=UserAccount::class, inversedBy="userProfiles")
     */
    private $account;

    /**
     * @ORM\OneToMany(targetEntity=Education::class, mappedBy="userProfile",cascade={"persist"})
     */
    private $education;

    /**
     * @ORM\OneToMany(targetEntity=Work::class, mappedBy="userProfile",cascade={"persist"})
     */
    private $work;



    public function __construct()
    {
        $this->domicile = new ArrayCollection();
        $this->family = new ArrayCollection();
        $this->education = new ArrayCollection();
        $this->work = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Domicile[]
     */
    public function getDomicile(): Collection
    {
        return $this->domicile;
    }

    public function addDomicile(Domicile $domicile): self
    {
        if (!$this->domicile->contains($domicile)) {
            $this->domicile[] = $domicile;
            $domicile->setUserProfile($this);
        }

        return $this;
    }

    public function removeDomicile(Domicile $domicile): self
    {
        if ($this->domicile->removeElement($domicile)) {
            // set the owning side to null (unless already changed)
            if ($domicile->getUserProfile() === $this) {
                $domicile->setUserProfile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Family[]
     */
    public function getFamily(): Collection
    {
        return $this->family;
    }

    public function addFamily(Family $family): self
    {
        if (!$this->family->contains($family)) {
            $this->family[] = $family;
            $family->setUserProfile($this);
        }

        return $this;
    }

    public function removeFamily(Family $family): self
    {
        if ($this->family->removeElement($family)) {
            // set the owning side to null (unless already changed)
            if ($family->getUserProfile() === $this) {
                $family->setUserProfile(null);
            }
        }

        return $this;
    }

    public function getAccount(): ?UserAccount
    {
        return $this->account;
    }

    public function setAccount(?UserAccount $account): self
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return Collection|Education[]
     */
    public function getEducation(): Collection
    {
        return $this->education;
    }

    public function addEducation(Education $education): self
    {
        if (!$this->education->contains($education)) {
            $this->education[] = $education;
            $education->setUserProfile($this);
        }

        return $this;
    }

    public function removeEducation(Education $education): self
    {
        if ($this->education->removeElement($education)) {
            // set the owning side to null (unless already changed)
            if ($education->getUserProfile() === $this) {
                $education->setUserProfile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Work[]
     */
    public function getWork(): Collection
    {
        return $this->work;
    }

    public function addWork(Work $work): self
    {
        if (!$this->work->contains($work)) {
            $this->work[] = $work;
            $work->setUserProfile($this);
        }

        return $this;
    }

    public function removeWork(Work $work): self
    {
        if ($this->work->removeElement($work)) {
            // set the owning side to null (unless already changed)
            if ($work->getUserProfile() === $this) {
                $work->setUserProfile(null);
            }
        }

        return $this;
    }




}
