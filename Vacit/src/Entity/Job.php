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
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="jobs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Job_title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job_description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job_picture;

    /**
     * @ORM\Column(type="datetime")
     */
    private $job_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job_level;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job_location;

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

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

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
        return $this->job_description;
    }

    public function setJobDescription(string $job_description): self
    {
        $this->job_description = $job_description;

        return $this;
    }

    public function getJobPicture(): ?string
    {
        return $this->job_picture;
    }

    public function setJobPicture(string $job_picture): self
    {
        $this->job_picture = $job_picture;

        return $this;
    }

    public function getJobDate(): ?\DateTimeInterface
    {
        return $this->job_date;
    }

    public function setJobDate(\DateTimeInterface $job_date): self
    {
        $this->job_date = $job_date;

        return $this;
    }

    public function getJobLevel(): ?string
    {
        return $this->job_level;
    }

    public function setJobLevel(string $job_level): self
    {
        $this->job_level = $job_level;

        return $this;
    }

    public function getJobLocation(): ?string
    {
        return $this->job_location;
    }

    public function setJobLocation(string $job_location): self
    {
        $this->job_location = $job_location;

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
