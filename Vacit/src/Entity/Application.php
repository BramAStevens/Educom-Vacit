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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Applications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity=Job::class, inversedBy="applications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Job;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Application_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Application_Company;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Application_invitation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getJob(): ?Job
    {
        return $this->Job;
    }

    public function setJob(?Job $Job): self
    {
        $this->Job = $Job;

        return $this;
    }

    public function getApplicationDate(): ?\DateTimeInterface
    {
        return $this->Application_date;
    }

    public function setApplicationDate(\DateTimeInterface $Application_date): self
    {
        $this->Application_date = $Application_date;

        return $this;
    }

    public function getApplicationCompany(): ?string
    {
        return $this->Application_Company;
    }

    public function setApplicationCompany(string $Application_Company): self
    {
        $this->Application_Company = $Application_Company;

        return $this;
    }

    public function getApplicationInvitation(): ?string
    {
        return $this->Application_invitation;
    }

    public function setApplicationInvitation(string $Application_invitation): self
    {
        $this->Application_invitation = $Application_invitation;

        return $this;
    }
}
