<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        $params = array(
            "username" => "username3",
            "password" => "blabla",
            "user_picture" => "picture1",
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

        $rep = $this->getDoctrine()->getRepository(User::class);
        $user = $rep->saveUser($params);

        dump($user);
        die();
    }
}
