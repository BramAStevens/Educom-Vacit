<?php

namespace App\Repository;

use App\Entity\Technology;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Technology|null find($id, $lockMode = null, $lockVersion = null)
 * @method Technology|null findOneBy(array $criteria, array $orderBy = null)
 * @method Technology[]    findAll()
 * @method Technology[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechnologyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Technology::class);
    }

    public function findTechnologyById($id)
    {
        if (isset($id)) {
            $technology = $this->find($id);
        } else {
            $technology = $this->find(1);
        }

        return $technology;
    }

    public function findTechnologyArrayById($id)
    {
        $technology = $this->findby(['id' => $id]);
        return $technology;
    }

    public function findAllTechnologies()
    {
        $alltech = $this->findAll();
        return $alltech;
    }
}
