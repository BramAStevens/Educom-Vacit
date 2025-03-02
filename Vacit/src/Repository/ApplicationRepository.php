<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Job;
use App\Entity\Application;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Application|null find($id, $lockMode = null, $lockVersion = null)
 * @method Application|null findOneBy(array $criteria, array $orderBy = null)
 * @method Application[]    findAll()
 * @method Application[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApplicationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Application::class);
    }

    public function findAllApplicationsByJob($job_id)
    {
        // for employer
        $applicationsByJob = $this->findby(
            ['job' => $job_id],
            ['id' => 'desc']
        );
        return $applicationsByJob;
    }

    public function deleteApplicationsByJob($job_id)
    {
        $applicationsByJob = $this->findby(['job' => $job_id]);
        foreach ($applicationsByJob as $job) {
            $em = $this->getEntityManager();
            $em->remove($job);
            $em->flush();
        }
    }

    public function findAllApplicationsByUser($user_id)
    {
        // by candidate
        $applicationsByUser = $this->findby(
            ['user' => $user_id],
            ['id' => 'desc']
        );
        return $applicationsByUser;
    }

    public function findApplicationById($id)
    {
        $application = $this->find($id);
        return $application;
    }

    public function createApplication(
        $user_id,
        $job_id,
        $application_company,
        $job_title
    ) {
        $application = new Application();
        $application->setUser($user_id);
        $application->setJob($job_id);
        $application->setApplicationCompany($application_company);
        $application->setJobTitle($job_title);
        $application->setApplicationDate(new \DateTime());
        $application->setApplicationInvitation(0);
        $em = $this->getEntityManager();
        $em->persist($application);
        $em->flush();
        return $application;
    }

    public function deleteApplication($id)
    {
        $application = $this->find($id);
        if ($application) {
            $em = $this->getEntityManager();
            $em->remove($application);
            $em->flush();
            return true;
        } else {
            return false;
        }
    }

    public function findApplicationByUserId($user_id)
    {
        $applicationByUser = $this->find($user_id);
        return $applicationByUser;
    }

    public function updateApplication($id)
    {
        $application = $this->findApplicationById($id);
        $application->setApplicationInvitation(1);
        $em = $this->getEntityManager();
        $em->persist($application);
        $em->flush();
        return $application;
    }
}
