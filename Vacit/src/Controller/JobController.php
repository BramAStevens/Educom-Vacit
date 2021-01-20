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
use App\Service\TechnologyService;
use App\Entity\Technology;

class JobController extends AbstractController
{
    private function auth(&$isAdmin) {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $isAdmin = $this->isGranted('ROLE_ADMIN');
    }

     /**
     * @Route("/createJob/", name="createJob")
     */
    public function createJob(JobService $jobService)
    {   
        $this->auth($isAdmin);
        $isEmployer = $this->isGranted('ROLE_EMPLOYER');
        $currentUser = $this->getUser();
        $user_id = $currentUser->getId();
        if ($currentUser == $isEmployer || $currentUser == $isAdmin) {
        $params['user_id'] = $user_id;
        $jobService->createJob($params);
        $job_id = $jobService->findHighestJob($user_id)->getId();
        return $this->redirectToRoute('updateJob',  ['id' => $job_id]);
        } return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/updateJob/{id}", name="updateJob")
     */
    public function updateJob(Request $request, JobService $jobService, TechnologyService $technologyService, $id)
    {
        $this->auth($isAdmin);
        $currentUser = $this->getUser();
        $job = $jobService->findJobById($id);
        $jobEmployer = $job->getUser();
        $technologies = $technologyService->findAllTechnologies();
        if ($currentUser == $jobEmployer || $currentUser == $isAdmin) {
            $jobService->updateJob($request, $id);
            return $this->render('job/update_job.html.twig', [
                'controller_name' => 'JobController',
                'job' => $job,
                'technologies' => $technologies]);
        } return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/deleteJob/{id}", name="deleteJob")
     */
    public function deleteJob(JobService $jobService, $id)
    {
        $this->auth($isAdmin);
        $currentUser = $this->getUser();
        $job = $jobService->findJobById($id);
        if ($currentUser == $job->getUser() || $currentUser == $isAdmin) {
            $result = $jobService->deleteJobById($id);
            dump($result);
            die();
        } return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/showJob/{id}", name="showJob")
     */
    public function showJobById(JobService $jobService, TechnologyService $technologyService, $id)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $job = $jobService->findJobById($id);
        $technology_id = $job->getTechnology()->getId();
        $technology = $technologyService->findTechnologyArrayById($technology_id);
        $employer_id = $job->getUser();
        $allJobsByEmployer = $jobService->findAllJobsByEmployer($employer_id);

            return $this->render('job/show_job.html.twig', [
                'controller_name' => 'JobController',
                'job' => $job,
                'allJobsByEmployer' => $allJobsByEmployer
                ]);
    }

    /**
     * @Route("/showAllJobsByEmployer/{user_id}", name="showAllJobsByEmployer")
     */
    public function showAllJobsByEmployer(JobService $jobService, $user_id) 
    {
        $this->auth($isAdmin);
        $allJobsByEmployer = $jobService->findAllJobsByEmployer($user_id);
        $currentUser = $this->getUser();
    
        if($currentUser->getId() == $user_id  || $currentUser == $isAdmin) {
         
        return $this->render('job/show_jobs_by_employer.html.twig', [
            'controller_name' => 'JobController',
            'jobs' => $allJobsByEmployer]);
        } return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/showAllJobs", name="showAllJobs")
     */
    public function showAllJobs(JobService $jobService)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $allJobs = $jobService->findAllJobs();
        dump($allJobs);
        die();
    }
}
