<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use App\Repository\UserRepository;
use App\Entity\User;

class UserService
{
    private $em;
    private $ur;
    private $encoder;

    public function __construct(
        EntityManagerInterface $em,
        UserRepository $ur,
        UserPasswordEncoderInterface $encoder
    ) {
        $this->em = $em;
        $this->ur = $ur;
        $this->encoder = $encoder;
    }

    public function saveUser($params)
    {
        $user = $this->ur->saveUser($params);
        return $user;
    }

    public function updateUserProfile($params)
    {
        $user = $this->ur->updateUserProfile($params);
        return $user;
    }

    public function getAllUsers()
    {
        $users = $this->ur->getAllUsers();
        return $users;
    }

    public function findUserById($id)
    {
        $user = $this->ur->findUserById($id);
        return $user;
    }

    public function deleteUserById($id)
    {
        $user = $this->ur->deleteUser($id);
        return $user;
    }
}
