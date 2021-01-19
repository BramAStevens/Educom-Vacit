<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TechnologyRepository;
use App\Entity\Technology;
use Symfony\Component\HttpFoundation\Request;

class TechnologyService 
{
    private $em;
    private $tr;


    public function __construct(EntityManagerInterface $em, TechnologyRepository $tr)
    {
        $this->em = $em;
        $this->tr = $tr;
       
    }
    
    public function findAllTechnologies()
    {
        $alltech = $this->tr->findAllTechnologies();
        return $alltech;
    }

    public function findTechnologyById($id)
    {
    $tech = $this->tr->findTechnologyById($id);
    return $tech;
    }

    public function findTechnologyArrayById($id)
    {
    $tech = $this->tr->findTechnologyArrayById($id);
    return $tech;
    }
}