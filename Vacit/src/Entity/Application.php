<?php

namespace App\Entity;

use App\Repository\ApplicationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicationRepository::class)
 */
class Application
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="applications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Job::class, inversedBy="applications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $job;

    /**
     * @ORM\Column(type="datetime")
     */
    private $application_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $application_company;

      /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $job_title;

    /**
     * @ORM\Column(type="integer")
     */
    private $application_invitation;

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

    public function getJob(): ?job
    {
        return $this->job;
    }

    public function setJob(?job $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getApplicationDate(): ?\DateTimeInterface
    {
        return $this->application_date;
    }

    public function setApplicationDate(
        \DateTimeInterface $application_date
    ): self {
        $this->application_date = $application_date;

        return $this;
    }

    public function getApplicationCompany(): ?string
    {
        return $this->application_company;
    }

    public function setApplicationCompany(string $application_company): self
    {
        $this->application_company = $application_company;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->job_title;
    }

    public function setJobTitle(string $job_title): self
    {
        $this->job_title = $job_title;

        return $this;
    }

    public function getApplicationInvitation(): ?int
    {
        return $this->application_invitation;
    }

    public function setApplicationInvitation(int $application_invitation): self
    {
        $this->application_invitation = $application_invitation;

        return $this;
    }
}
