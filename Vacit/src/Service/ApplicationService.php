<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;

use App\Repository\ApplicationRepository;
use App\Entity\Application;
use App\Repository\JobRepository;
use App\Repository\UserRepository;

class ApplicationService 
{
    private $em;
    private $ar;
    private $jr;
    private $ur;

    public function __construct(EntityManagerInterface $em, ApplicationRepository $ar, JobRepository $jr, UserRepository $ur)
    {
        $this->em = $em;
        $this->ar = $ar;
        $this->jr = $jr;
        $this->ur = $ur;
    }

    public function createApplication($params)
    {   
        $user_id = $this->ur->find($params['user_id']);
        $job_id = $this->jr->find($params['job_id']);
        $applicationEmployerId = $this->jr->find($params['job_id'])->getUser()->getId();
        $application_company = $this->ur->find($applicationEmployerId)->getUsername();
        $job_title = $this->jr->find($params['job_id'])->getJobTitle();
        $application = $this->ar->createApplication($user_id, $job_id, $application_company, $job_title);
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

    public function findApplicationByUserId($user_id) {
        $application = $this->ar->findApplicationByUserId($user_id);
        return $application;
    }

    public function updateApplication($id)
    {
        $invite = $this->ar->updateApplication($id);
        return $invite;
    }

    public function findApplicationById($id)
    {
        $application = $this->ar->findApplicationById($id);
        return $application;
    }

    public function deleteApplicationsByJob($job_id) {
        $application = $this->ar->deleteApplicationsByJob($job_id);
        return $application;
    }

} 