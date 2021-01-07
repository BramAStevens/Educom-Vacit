<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/saveUser", name="saveUser")
     */
    public function saveUser()
    {
        $params = array(

            "username" => "username69",
            "password" => "blabla",
            "user_picture" => "YES",
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

        $rep = $this->getDoctrine()->getRepository(User::class); //make service to handle this instead. do this with post
        $user = $rep->saveUser($params);

        dump($user);
        die();
    }

    /**
     * @Route("/showUsers", name="showUsers")
     */
    public function showUsers() {
        
        $rep = $this->getDoctrine()->getRepository(User::class);
        $user = $rep->getAllUsers();

        dump($user);
        die();
    }
}

// GOOD - use of the normal security methods
// $hasAccess = $this->isGranted('ROLE_ADMIN');
// $this->denyAccessUnlessGranted('ROLE_ADMIN');
