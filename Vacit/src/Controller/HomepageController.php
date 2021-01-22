<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\UserService;
use App\Entity\User;
use App\Service\JobService;
use App\Entity\Job;
use App\Service\TechnologyService;
use App\Entity\Technology;

class HomepageController extends AbstractController
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function index(JobService $jobService)
    {
        $jobs = $jobService->findAllJobs();
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'jobs' => $jobs,
        ]);
    }
}
