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
    private function auth(&$isAdmin)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $isAdmin = $this->isGranted('ROLE_ADMIN');
    }
    /**
     * @Route("/applyToVacancy/{job_id}", name="applyToVacancy")
     */
    public function applyToVacancy(Request $request, ApplicationService $applicationService,$job_id) {
        $this->auth($isAdmin);
        $isEmployer = $this->isGranted('ROLE_EMPLOYER');
        $currentUser = $this->getUser();
        if ($currentUser == $isAdmin || $currentUser != $isEmployer) {
            $user_id = $currentUser->getId();
            $params['user_id'] = $user_id;
            $params['job_id'] = $job_id;
            $applicationService->createApplication($params);
            return $this->redirectToRoute('showJob', ['id' => $job_id]);
        }
        return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/removeApplication/{id}", name="removeApplication")
     */
    public function deleteApplication(ApplicationService $applicationService, $id) {
        $this->auth($isAdmin);
        $currentUser = $this->getUser();
        $application = $applicationService->findApplicationById($id);
        if ($currentUser == $application->getUser() || $currentUser == $isAdmin) {
            $remove = $applicationService->deleteApplication($id);
            dump($remove);
            die();
        }
        return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/applicationsByJob/{job_id}", name="applicationsByJob")
     */
    public function findAllApplicationsByJob(ApplicationService $applicationService, $job_id) {
        $this->auth($isAdmin);
        $currentUser = $this->getUser();
        $currentUsername = $currentUser->getUsername();
        $applications = $applicationService->findAllApplicationsByJob($job_id);
        foreach ($applications as $application) {
        $appUsername = $application->getUser()->getUsername();
        if ($currentUser == $appUsername || $currentUser == $isAdmin) {
            return $this->render('application/applications_by_job.html.twig', [
                'controller_name' => 'ApplicationController',
                'applications' => $applications,
            ]);
        }
        return $this->render('user/noaccess.html.twig');
      }
    }

    /**
     * @Route("/applicationsByUser/{user_id}", name="applicationsByUser")
     */
    public function findAllApplicationsByUser(ApplicationService $applicationService, $user_id) {
        $this->auth($isAdmin);
        $user = $this->getUser();
        $currentUser = $user->getId();
        if ($currentUser == $user_id || $currentUserId == $isAdmin) {
            $applications = $applicationService->findAllApplicationsByUser(
                $user_id
            );

            return $this->render('application/show_my_applications.html.twig', [
                'controller_name' => 'ApplicationController',
                'applications' => $applications,
                'user' => $user,
            ]);
        }
        return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/inviteApplicant/{id}", name="inviteApplicant")
     */
    public function inviteApplicant(ApplicationService $applicationService, $id)
    {
        $this->auth($isAdmin);
        $currentUser = $this->getUser()->getUsername();
        $application = $applicationService->findApplicationByUserId($id);
        foreach ($application as $app) {
            $appCompany = $app->getApplicationCompany();
            $job_id = $app->getJob()->getId();
            if ($currentUser == $appCompany || $currentUser == $isAdmin) {
                $invite = $applicationService->updateApplication($id);
                return $this->redirectToRoute('applicationsByJob', ['job_id' => $job_id]);
            } return $this->render('user/noaccess.html.twig');
        }
    }
}
