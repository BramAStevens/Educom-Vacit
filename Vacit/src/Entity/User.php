<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_picture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_surname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_dob;

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
     * @ORM\OneToMany(targetEntity=Job::class, mappedBy="user")
     */
    private $jobs;

    /**
     * @ORM\OneToMany(targetEntity=Application::class, mappedBy="user")
     */
    private $applications;

    public function __construct()
    {
        $this->jobs = new ArrayCollection();
        $this->applications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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


    public function getUserEmail(): ?string
    {
        return $this->User_email;
    }

    public function setUserEmail(string $User_email): self
    {
        $this->User_email = $User_email;

        return $this;
    }

    public function getUserDob(): ?string
    {
        return $this->User_dob;
    }

    public function setUserDob(string $User_dob): self
    {
        $this->User_dob = $User_dob;

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
        return $this->jobs;
    }

    public function addJob(Job $job): self
    {
        if (!$this->jobs->contains($job)) {
            $this->jobs[] = $job;
            $job->setUser($this);
        }

        return $this;
    }

    public function removeJob(Job $job): self
    {
        if ($this->jobs->removeElement($job)) {
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
        return $this->applications;
    }

    public function addApplication(Application $application): self
    {
        if (!$this->applications->contains($application)) {
            $this->applications[] = $application;
            $application->setUser($this);
        }

        return $this;
    }

    public function removeApplication(Application $application): self
    {
        if ($this->applications->removeElement($application)) {
            // set the owning side to null (unless already changed)
            if ($application->getUser() === $this) {
                $application->setUser(null);
            }
        }

        return $this;
    }
}
