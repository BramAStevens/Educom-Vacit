<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\JobRepository;
use App\Entity\Job;

class JobService
{
    private $em;
    private $jr;

    public function __construct(EntityManagerInterface $em, JobRepository $jr)
    {
        $this->em = $em;
        $this->jr = $jr;
    }

    public function deleteJobById($id)
    {
        $job = $this->jr->deleteJob($id);
        return $job;
    }

    public function findJobById($id)
    {
        $job = $this->jr->findJobById($id);
        return $job;
    }

    public function updateJob(Request $request, $id)
    {   
        $job = $this->findJobById($id);
        $params['id'] = $id;
        $params['job_title'] = $request->request->get('job_title',$job->getJobTitle());
        $params['job_description'] = $request->request->get('job_description',$job->getJobDescription());
        $params['job_picture'] = $request->request->get('job_picture',$job->getJobPicture());
        $params['job_level'] = $request->request->get('job_level',$job->getJobLevel());
        $params['job_location'] = $request->request->get('job_location',$job->getJobLocation());
        $update = $this->jr->updateJob($params);
        return $update;
    }

    public function createJob($params)
    {
        $job = $this->jr->createJob($params);
        return $job;
    }

    public function findHighestJob($user_id)
    {
        $job = $this->jr->findHighestJob($user_id);
        return $job;
    }

    public function findAllJobsByEmployer($user_id)
    {
        $job = $this->jr->findAllJobsByEmployer($user_id);
        return $job;
    }

    public function findAllJobs()
    {
        $jobs = $this->jr->findAllJobs();
        return($jobs);
    }


}
