<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

use App\Repository\ApplicationRepository;
use App\Entity\Application;

class ApplicationService 
{
    private $em;
    private $ar;

    public function __construct(EntityManagerInterface $em, ApplicationRepository $ar)
    {
        $this->em = $em;
        $this->ar = $ar;
    }

    public function createApplication($params)
    {   
        $application = $this->ar->createApplication($params);
        return $application;
    }

    public function deleteApplication($id)
    {
        $application = $this->ar->deleteApplication($id);
        return $application;
    }

    public function findAllApplicationsByJob($job_id)
    {
        $applications = $this->ar->findAllApplicationsByJob($job_id);
        return $applications;
    }

    public function findAllApplicationsByUser($user_id)
    {
        $applications = $this->ar->findAllApplicationsByUser($user_id);
        return $applications;
    }

    public function updateApplication($id)
    {
        $invite = $this->ar->updateApplication($id);
        return $invite;
    }

} 