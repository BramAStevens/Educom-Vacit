<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\ApplicationService;
use App\Entity\Application;


class ApplicationController extends AbstractController
{
    private function auth(&$isAdmin) {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $isAdmin = $this->isGranted('ROLE_ADMIN');
    }
    /**
     * @Route("/applyToVacancy/{job_id}", name="applyToVacancy")
     */
    public function applyToVacancy(Request $request, ApplicationService $applicationService, $job_id)
    {   
        $this->auth($isAdmin);
        $isEmployer = $this->isGranted('ROLE_EMPLOYER');
        $currentUser = $this->getUser();
        if($currentUser == $isAdmin || $currentUser != $isEmployer){
        $user_id = $currentUser->getId();
        $params['user_id'] = $user_id;
        $params['job_id'] = $job_id;
        $applicationService->createApplication($params);
        return $this->render('application/apply_vacancy.html.twig');
        } return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/removeApplication/{id}", name="removeApplication")
     */
    public function deleteApplication(ApplicationService $applicationService, $id) { 
        $this->auth($isAdmin);
        $currentUser = $this->getUser();
        $application = $applicationService->findApplicationById($id);
        if($currentUser == $application->getUser() || $currentUser == $isAdmin) {
        $remove = $applicationService->deleteApplication($id);
        dump($remove);
        die();
        } return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/applicationsByJob/{job_id}", name="applicationsByJob")
     */
    public function findAllApplicationsByJob(ApplicationService $applicationService, $job_id) {
        $this->auth($isAdmin);
        $currentUser = $this->getUser();
        $isEmployer = $this->isGranted('ROLE_EMPLOYER');
        $application = $applicationService->findApplicationById($job_id);
        if($currentUser == $isEmployer || $currentUser == $isAdmin) {
        $applications = $applicationService->findAllApplicationsByJob($job_id);
        dump($applications);
        die();
        } return $this->render('user/noaccess.html.twig');
    }

     /**
     * @Route("/applicationsByUser/{user_id}", name="applicationsByUser")
     */
    public function findAllApplicationsByUser(ApplicationService $applicationService, $user_id) { 
        $this->auth($isAdmin);
        $user = $this->getUser();
        $currentUser = $user->getId();
        if($currentUser == $user_id || $currentUserId == $isAdmin) {
        $applications = $applicationService->findAllApplicationsByUser($user_id);
        return $this->render('application/show_my_applications.html.twig', [
            'controller_name' => 'ApplicationController',
            'applications' => $applications,
            'user' => $user]);
      

        } return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/inviteApplicant/{id}", name="inviteApplicant")
     */
    public function inviteApplicant(ApplicationService $applicationService, $id) { 
        $this->auth($isAdmin);
        $currentUser = $this->getUser()->getUsername();
        $application = $applicationService->findApplicationById($id);
        if($currentUser == $application->getApplicationCompany() || $currentUser == $isAdmin) {
        $invite = $applicationService->updateApplication($id);
        dump($invite);
        die();
        } return $this->render('user/noaccess.html.twig');
    }
}
