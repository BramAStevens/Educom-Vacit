<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\JobRepository;
use App\Repository\UserRepository;
use App\Repository\TechnologyRepository;
use App\Repository\ApplicationRepository;
use App\Entity\Job;
use App\Entity\User;
use App\Entity\Technology;
use App\Entity\Application;

class JobService
{
    private $em;
    private $jr;
    private $ur;
    private $tr;
    private $ar;

    public function __construct(EntityManagerInterface $em, ApplicationRepository $ar, JobRepository $jr, UserRepository $ur, TechnologyRepository $tr)
    {
        $this->em = $em;
        $this->jr = $jr;
        $this->ur = $ur;
        $this->tr = $tr;
        $this->ar = $ar;
    }

    public function deleteJobById($id)
    {   
        $value= $this->ar->deleteApplicationsByJob($id);
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
        $params['technology_id'] = $request->request->get('technology_id',$job->getTechnology());
       
        $technology = $this->tr->findTechnologyById($params['technology_id']);
        $update = $this->jr->updateJob($params, $technology);
        return $update;
    }

    public function createJob($params)
    {
        $user = $this->ur->find($params['user_id']);
        $job = $this->jr->createJob($user);
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
