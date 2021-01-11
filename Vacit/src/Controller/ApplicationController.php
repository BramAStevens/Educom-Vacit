<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\UserService;
use App\Entity\User;
use App\Service\JobService;
use App\Entity\Job;
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
        if($currentUser == $isAdmin || $currentUser == $isEmployer){
        $user_id = $currentUser->getId();
        $application = $applicationService->findApplicationById($job_id);
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
        $remove = $applicationService->deleteApplication($id);
        dump($remove);
        die();
    }

    /**
     * @Route("/applicationsByJob/{job_id}", name="applicationsByJob")
     */
    public function findAllApplicationsByJob(ApplicationService $applicationService, $job_id) {
        $this->auth($isAdmin);
        $applications = $applicationService->findAllApplicationsByJob($job_id);
        dump($applications);
        die();
    }

     /**
     * @Route("/applicationsByUser/{user_id}", name="applicationsByUser")
     */
    public function findAllApplicationsByUser(ApplicationService $applicationService, $user_id) {
        $this->auth($isAdmin);
        $applications = $applicationService->findAllApplicationsByUser($user_id);
        dump($applications);
        die();
    }

    /**
     * @Route("/inviteApplicant/{id}", name="inviteApplicant")
     */
    public function inviteApplicant(ApplicationService $applicationService, $id) {
        $this->auth($isAdmin);
        $invite = $applicationService->updateApplication($id);
        dump($invite);
        die();
    }
}
