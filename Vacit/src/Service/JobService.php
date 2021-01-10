<?php

namespace App\Service;

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

    public function updateJob($params)
    {
        $job = $this->jr->updateJob($params);
        return $job;
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
