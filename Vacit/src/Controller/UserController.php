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
     * @Route("/registerUser", name="registerUser")
     */
    public function registerUser(UserService $userService, Request $request)
    {
     
        $params["username"] = $request->request->get("username");
        $params["password"] = $request->request->get("password");    
    
        $data = $userService->saveUser($params);
      
        return $this->render('user/register.html.twig');
       
    }

    /**
     * @Route("/showUsers", name="showUsers")
     */
    public function showUsers(UserService $userService) {
        
        $user = $userService->getAllUsers();
        dump($user);
        die();
    }
    /**
     * @Route("/updateUserProfile/{id}", name="updateUserProfile")
     */
    public function updateUserProfile(Request $request, UserService $userService, $id) {
        // $params = array(

        //     "id" => $id,
        //     "user_picture" => "NO",
        //     "user_surname" => "surname1",
        //     "user_lastname" => "lastname1",
        //     "user_email" => "email1",
        //     "user_dob" => "10-05-1990",
        //     "user_phone_number" => "12324",
        //     "user_address" => "address1",
        //     "user_postcode" => "postcode1",
        //     "user_city" => "city1",
        //     "user_motivation" => "motivation1",
        //     "user_cv" => "cv1",

        // );
        
        $params["id"] = $id;
        $params["user_picture"] = $request->request->get("user_picture");
        $params["user_surname"] = $request->request->get("user_surname");    
        $params["user_lastname"] = $request->request->get("user_lastname");
        $params["user_email"] = $request->request->get("user_email");
        $params["user_dob"] = $request->request->get("user_dob");
        $params["user_phone_number"] = $request->request->get("user_phone_number");
        $params["user_address"] = $request->request->get("user_address");
        $params["user_postcode"] = $request->request->get("user_postcode");
        $params["user_city"] = $request->request->get("user_city");
        $params["user_motivation"] = $request->request->get("user_surname");    
        $params["user_cv"] = $request->request->get("user_cv");

        $user = $userService->findUserById($id);
        $userService->updateUserProfile($params);
        return $this->render('user/profile.html.twig');
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
