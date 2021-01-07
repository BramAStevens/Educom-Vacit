<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Service\UserService;
use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/saveUser", name="saveUser")
     */
    public function saveUser(UserService $userService)
    {
        $params = array(
            
            "username" => "username64",
            "password" => "blabla",

        );

       // $rep = $this->getDoctrine()->getRepository(User::class); //do this with post
        $user = $userService->saveUser($params);
        dump($user);
        die();
    }

    /**
     * @Route("/showUsers", name="showUsers")
     */
    public function showUsers(UserService $userService) {
        
      //  $rep = $this->getDoctrine()->getRepository(User::class);
        $user = $userService->getAllUsers();

        dump($user);
        die();
    }
    /**
     * @Route("/updateUserProfile/{id}", name="updateUserProfile")
     */
    public function updateUserProfile(UserService $userService, $id) {
        $params = array(

            "id" => $id,
            "user_picture" => "NO",
            "user_surname" => "surname1",
            "user_lastname" => "lastname1",
            "user_email" => "email1",
            "user_dob" => "10-05-1990",
            "user_phone_number" => "12324",
            "user_address" => "address1",
            "user_postcode" => "postcode1",
            "user_city" => "city1",
            "user_motivation" => "motivation1",
            "user_cv" => "cv1",

        );
        $user = $userService->findUserById($id);
        $userService->updateUserProfile($params);
        dump($user);
        die();
    }

    /**
     * @Route("/deleteUserProfile/{id}", name="deleteUserProfile")
     */
    public function deleteUserProfile(UserService $userService, $id) {
        $user = $userService->deleteUserById($id);
        dump($user);
        die();
    }

}

// GOOD - use of the normal security methods
// $hasAccess = $this->isGranted('ROLE_ADMIN');
// $this->denyAccessUnlessGranted('ROLE_ADMIN');
