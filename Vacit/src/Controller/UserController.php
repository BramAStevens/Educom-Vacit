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
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $isEmployer = $this->isGranted('ROLE_EMPLOYER');
        $user = $userService->findUserById($id);

        if ($user == $isEmployer) {
            return $this->render('user/show_employer_profile.html.twig', [
                'controller_name' => 'UserController',
                'user' => $user]);
        } else {
            return $this->render('user/show_candidate_profile.html.twig', [
                'controller_name' => 'UserController',
                'user' => $user]);
        }
    }

    /**
     * @Route("/updateUserProfile/{id}", name="updateUserProfile")
     */
    public function updateUserProfile(Request $request,UserService $userService,$id)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $isAdmin = $this->isGranted('ROLE_ADMIN');
        $isEmployer = $this->isGranted('ROLE_EMPLOYER');
        $user = $userService->findUserById($id);
        $currentUser = $this->getUser();

        if ($user == $currentUser || $currentUser == $isAdmin) {
            $userService->updateUserProfile($request, $id);

            if ($user == $isEmployer) {
                return $this->render('user/update_employer_profile.html.twig', [
                    'controller_name' => 'UserController',
                    'user' => $user]);
            } else {
                return $this->render(
                    'user/update_candidate_profile.html.twig',[
                    'controller_name' => 'UserController',
                    'user' => $user]);
            }
        } return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/deleteUserProfile/{id}", name="deleteUserProfile")
     */
    public function deleteUserProfile(UserService $userService, $id)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
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
