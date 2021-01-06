<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 */
class Job
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="Job_title")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Job_title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Job_description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Job_picture;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Job_date;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Job_level;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Job_location;

    /**
     * @ORM\OneToMany(targetEntity=Application::class, mappedBy="Job")
     */
    private $applications;

    public function __construct()
    {
        $this->applications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?user
    {
        return $this->User_id;
    }

    public function setUserId(?user $User_id): self
    {
        $this->User_id = $User_id;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->Job_title;
    }

    public function setJobTitle(string $Job_title): self
    {
        $this->Job_title = $Job_title;

        return $this;
    }

    public function getJobDescription(): ?string
    {
        return $this->Job_description;
    }

    public function setJobDescription(string $Job_description): self
    {
        $this->Job_description = $Job_description;

        return $this;
    }

    public function getJobPicture(): ?string
    {
        return $this->Job_picture;
    }

    public function setJobPicture(string $Job_picture): self
    {
        $this->Job_picture = $Job_picture;

        return $this;
    }

    public function getJobDate(): ?\DateTimeInterface
    {
        return $this->Job_date;
    }

    public function setJobDate(\DateTimeInterface $Job_date): self
    {
        $this->Job_date = $Job_date;

        return $this;
    }

    public function getJobLevel(): ?string
    {
        return $this->Job_level;
    }

    public function setJobLevel(string $Job_level): self
    {
        $this->Job_level = $Job_level;

        return $this;
    }

    public function getJobLocation(): ?string
    {
        return $this->Job_location;
    }

    public function setJobLocation(string $Job_location): self
    {
        $this->Job_location = $Job_location;

        return $this;
    }

    /**
     * @return Collection|Application[]
     */
    public function getApplications(): Collection
    {
        return $this->applications;
    }

    public function addApplication(Application $application): self
    {
        if (!$this->applications->contains($application)) {
            $this->applications[] = $application;
            $application->setJob($this);
        }

        return $this;
    }

    public function removeApplication(Application $application): self
    {
        if ($this->applications->removeElement($application)) {
            // set the owning side to null (unless already changed)
            if ($application->getJob() === $this) {
                $application->setJob(null);
            }
        }

        return $this;
    }
}
