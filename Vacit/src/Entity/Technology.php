<?php

namespace App\Entity;

use App\Repository\TechnologyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TechnologyRepository::class)
 */
class Technology
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Job::class, mappedBy="technology")
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Tech_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Tech_picture;

    public function __construct()
    {
        $this->job = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Job[]
     */
    public function getJob(): Collection
    {
        return $this->job;
    }

    public function addJob(Job $job): self
    {
        if (!$this->job->contains($job)) {
            $this->job[] = $job;
            $job->setTechnology($this);
        }

        return $this;
    }

    public function removeJob(Job $job): self
    {
        if ($this->job->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getTechnology() === $this) {
                $job->setTechnology(null);
            }
        }

        return $this;
    }

    public function getTechName(): ?string
    {
        return $this->Tech_name;
    }

    public function setTechName(?string $Tech_name): self
    {
        $this->Tech_name = $Tech_name;

        return $this;
    }

    public function getTechPicture(): ?string
    {
        return $this->Tech_picture;
    }

    public function setTechPicture(?string $Tech_picture): self
    {
        $this->Tech_picture = $Tech_picture;

        return $this;
    }
}
