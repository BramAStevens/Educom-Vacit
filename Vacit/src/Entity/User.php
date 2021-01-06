<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_picture;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $User_surname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $User_lastname;

    /**
     * @ORM\Column(type="json")
     */
    private $User_role = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_email;

    /**
     * @ORM\Column(type="date")
     */
    private $User_DOB;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_phone_number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_address;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $User_postcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_motivation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_cv;

    /**
     * @ORM\OneToMany(targetEntity=Job::class, mappedBy="User", orphanRemoval=true)
     */
    private $Jobs;

    /**
     * @ORM\OneToMany(targetEntity=Application::class, mappedBy="User", orphanRemoval=true)
     */
    private $Applications;

    public function __construct()
    {
        $this->Jobs = new ArrayCollection();
        $this->Applications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserPicture(): ?string
    {
        return $this->User_picture;
    }

    public function setUserPicture(string $User_picture): self
    {
        $this->User_picture = $User_picture;

        return $this;
    }

    public function getUserSurname(): ?string
    {
        return $this->User_surname;
    }

    public function setUserSurname(string $User_surname): self
    {
        $this->User_surname = $User_surname;

        return $this;
    }

    public function getUserLastname(): ?string
    {
        return $this->User_lastname;
    }

    public function setUserLastname(string $User_lastname): self
    {
        $this->User_lastname = $User_lastname;

        return $this;
    }

    public function getUserRole(): ?array
    {
        return $this->User_role;
    }

    public function setUserRole(array $User_role): self
    {
        $this->User_role = $User_role;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->User_email;
    }

    public function setUserEmail(string $User_email): self
    {
        $this->User_email = $User_email;

        return $this;
    }

    public function getUserDOB(): ?\DateTimeInterface
    {
        return $this->User_DOB;
    }

    public function setUserDOB(\DateTimeInterface $User_DOB): self
    {
        $this->User_DOB = $User_DOB;

        return $this;
    }

    public function getUserPhoneNumber(): ?string
    {
        return $this->User_phone_number;
    }

    public function setUserPhoneNumber(string $User_phone_number): self
    {
        $this->User_phone_number = $User_phone_number;

        return $this;
    }

    public function getUserAddress(): ?string
    {
        return $this->User_address;
    }

    public function setUserAddress(string $User_address): self
    {
        $this->User_address = $User_address;

        return $this;
    }

    public function getUserPostcode(): ?string
    {
        return $this->User_postcode;
    }

    public function setUserPostcode(string $User_postcode): self
    {
        $this->User_postcode = $User_postcode;

        return $this;
    }

    public function getUserCity(): ?string
    {
        return $this->User_city;
    }

    public function setUserCity(string $User_city): self
    {
        $this->User_city = $User_city;

        return $this;
    }

    public function getUserMotivation(): ?string
    {
        return $this->User_motivation;
    }

    public function setUserMotivation(string $User_motivation): self
    {
        $this->User_motivation = $User_motivation;

        return $this;
    }

    public function getUserCv(): ?string
    {
        return $this->User_cv;
    }

    public function setUserCv(string $User_cv): self
    {
        $this->User_cv = $User_cv;

        return $this;
    }

    /**
     * @return Collection|Job[]
     */
    public function getJobs(): Collection
    {
        return $this->Jobs;
    }

    public function addJobs(Job $job): self
    {
        if (!$this->Jobs->contains($job)) {
            $this->Jobs[] = $job;
            $job->setUser($this);
        }

        return $this;
    }

    public function removeJobs(Job $job): self
    {
        if ($this->Jobs->removeElement($job)) {
            // set the owning side to null (unless already changed)
            if ($job->getUser() === $this) {
                $job->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Application[]
     */
    public function getApplications(): Collection
    {
        return $this->Applications;
    }

    public function addApplication(Application $application): self
    {
        if (!$this->Applications->contains($application)) {
            $this->Applications[] = $application;
            $application->setUser($this);
        }

        return $this;
    }

    public function removeApplication(Application $application): self
    {
        if ($this->Applications->removeElement($application)) {
            // set the owning side to null (unless already changed)
            if ($application->getUser() === $this) {
                $application->setUser(null);
            }
        }

        return $this;
    }
}
