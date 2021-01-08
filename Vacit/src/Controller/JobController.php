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

class JobController extends AbstractController
{
    /**
     * @Route("/deleteJob/{id}", name="deleteJob")
     */
    public function deleteJob(JobService $jobService, $id)
    {
        $isAdmin = $this->isGranted('ROLE_ADMIN');
        $currentUser = $this->getUser();
        $job = $jobService->findJobById($id);

        if ($currentUser == $job->getUser() || $currentUser == $isAdmin) {
            $result = $jobService->deleteJobById($id);
            dump($result);
            die();
        }
        return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/updateJob/{id}", name="updateJob")
     */
    public function updateJob(Request $request, JobService $jobService, $id)
    {
        $isAdmin = $this->isGranted('ROLE_ADMIN');
        $currentUser = $this->getUser();
        $job = $jobService->findJobById($id);

        if ($currentUser == $job->getUser() || $currentUser == $isAdmin) {
            $params['id'] = $id;
            $params['job_title'] = $request->request->get('job_title',$job->getJobTitle());
            $params['job_description'] = $request->request->get('job_description',$job->getJobDescription());
            $params['job_picture'] = $request->request->get('job_picture',$job->getJobPicture());
            $params['job_level'] = $request->request->get('job_level',$job->getJobLevel());
            $params['job_location'] = $request->request->get('job_location',$job->getJobLocation());

            $jobService->updateJob($params);

            return $this->render('job/update_job.html.twig', [
                'controller_name' => 'JobController',
                'job' => $job,
            ]);
        }
        return $this->render('user/noaccess.html.twig');
    }

    /**
     * @Route("/createJob", name="createJob")
     */
    public function createJob(JobService $jobService)
    {
        $currentUser = $this->getUser();
        $user_id = $currentUser->getId();

        $params['user_id'] = $user_id;

        $jobService->createJob($params);
        return $this->render('job/create_job_button.html.twig');
    }

    public function showAllJobs() {

    }
}
