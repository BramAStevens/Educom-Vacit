<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Job;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Job::class);
    }

    public function updateJob($params, $technology)
    {
        $job = $this->find($params['id']);

        $job->setJobTitle($params['job_title']);
        $job->setJobDescription($params['job_description']);
        $job->setJobPicture($params['job_picture']);
        $job->setJobLevel($params['job_level']);
        $job->setJobLocation($params['job_location']);
        $job->setTechnology($technology);

        $em = $this->getEntityManager();
        $em->persist($job);
        $em->flush();

        return $job;
    }

    public function createJob($user)
    {
        $job = new Job();
        $job->setJobDate(new \DateTime());

        $job->setJobTitle('');
        $job->setJobDescription('');
        $job->setJobPicture('');
        $job->setJobLevel('');
        $job->setJobLocation('');
        $job->setTechnology(NULL)->getId(1);
        $job->setUser($user);

        $em = $this->getEntityManager();
        $em->persist($job);
        $em->flush();
     
        return $job;
    }

    public function deleteJob($id)
    {
        $job = $this->find($id);
        if ($job) {
            $em = $this->getEntityManager();
            $em->remove($job);
            $em->flush();
            return true;
        } else {
            return false;
        }
    }

    public function findJobById($id)
    {
        $job = $this->find($id);
        return $job;
    }

    public function findAllJobsByEmployer($user_id)
    {
        $allJobsForThisUser = $this->findby(array('user' => $user_id), array('id'=>'desc'));
        return $allJobsForThisUser;
    }

    public function findHighestJob($user_id) 
    {
        $allJobsForThisUser = $this->findAllJobsByEmployer($user_id);
     
        return $allJobsForThisUser['0'];
    }

    public function findAllJobs()
    {
        $alljobs = $this->findBy(array(), array('id'=>'desc'));
        return($alljobs);
    }

    
}
