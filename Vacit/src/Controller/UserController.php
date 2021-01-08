<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Service\UserService;
use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/showUser/{id}", name="showUser")
     */
    public function showUserById(UserService $userService, $id)
    {   
        $isEmployer = $this->isGranted('ROLE_EMPLOYER');
        $user = $userService->findUserById($id);

        if($user == $isEmployer) {
            return $this->render('user/show_employer_profile.html.twig', [
                'controller_name' => 'UserController', 
                'user'=>$user,
            ]);
        } else {
            return $this->render('user/show_candidate_profile.html.twig', [
                'controller_name' => 'UserController', 
                'user'=>$user,
            ]);
        }
    }

    /**
     * @Route("/updateUserProfile/{id}", name="updateUserProfile")
     */
    public function updateUserProfile(Request $request, UserService $userService, $id) {

        $isAdmin = $this->isGranted('ROLE_ADMIN');
        $isEmployer = $this->isGranted('ROLE_EMPLOYER');
        $user = $userService->findUserById($id);
        $currentUser = $this->getUser();

        if ($user == $currentUser || $currentUser == $isAdmin) {
           
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

            $userService->updateUserProfile($params);

            if ($user == $isEmployer) {    
            return $this->render('user/update_employer_profile.html.twig', [
                'controller_name' => 'UserController', 
                'user'=>$user,
            ]);
            } else {
                return $this->render('user/update_candidate_profile.html.twig', [
                    'controller_name' => 'UserController', 
                    'user'=>$user,
                ]);
            }
        } return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/deleteUserProfile/{id}", name="deleteUserProfile")
     */
    public function deleteUserProfile(UserService $userService, $id)
    {
        $isAdmin = $this->isGranted('ROLE_ADMIN');
        $user = $userService->findUserById($id);
        $currentUser = $this->getUser();

        if ($user == $currentUser || $currentUser == $isAdmin) {
            $result = $userService->deleteUserById($id);
            dump($result);
            die();
        } return $this->render('user/noaccess.html.twig');
    }
}

// GOOD - use of the normal security methods
// $hasAccess = $this->isGranted('ROLE_ADMIN');
// $this->denyAccessUnlessGranted('ROLE_ADMIN');
