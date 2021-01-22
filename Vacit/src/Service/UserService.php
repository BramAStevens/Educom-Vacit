<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;

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

    public function updateUserProfile(Request $request, $id)
    {   
        $user = $this->findUserById($id);
        $params['id'] = $id;
        $params['user_picture'] = $request->request->get('user_picture', $user->getUserPicture());
        $params['user_surname'] = $request->request->get('user_surname', $user->getUserSurname());
        $params['user_lastname'] = $request->request->get('user_lastname', $user->getUserLastname());
        $params['user_email'] = $request->request->get('user_email', $user->getUserEmail());
        $params['user_dob'] = $request->request->get('user_dob', $user->getUserDob());
        $params['user_phone_number'] = $request->request->get('user_phone_number', $user->getUserPhoneNumber());
        $params['user_address'] = $request->request->get('user_address', $user->getUserAddress());
        $params['user_postcode'] = $request->request->get('user_postcode', $user->getUserPostcode());
        $params['user_city'] = $request->request->get('user_city', $user->getUserCity());
        $params['user_motivation'] = $request->request->get('user_motivation', $user->getUserMotivation());
        $params['user_cv'] = $request->request->get('user_cv', $user->getUserCv());
        $update = $this->ur->updateUserProfile($params);
        return $update;
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
