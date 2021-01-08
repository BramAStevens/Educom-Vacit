<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\JobRepository;
use App\Entity\Job;

class JobService {
    private $em;
    private $jr;

    public function __construct(EntityManagerInterface $em, JobRepository $jr){
        $this->em = $em;
        $this->jr = $jr;
    }

    public function deleteJobById($id) {
        $job = $this->jr->deleteJob($id);
        return($job);
    }

    public function findJobById($id)
    {
        $job= $this->jr->findJobById($id);
        return($job);
    }

    public function createAndUpdateJob($params) {
        $job = $this->jr->createAndUpdateJob($params);
        return($job);
    }

}