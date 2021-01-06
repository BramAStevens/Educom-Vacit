<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function saveUser($params) {

        if(isset($params["id"])) {
            $user = $this->find($params["id"]);
        } else {
            $user = new User();
        }

        $user->setUsername($params["username"]);
        $user->setPassword($params["password"]);
        $user->setUserPicture($params["user_picture"]);
        $user->setUserSurname($params["user_surname"]);
        $user->setUserLastname($params["user_lastname"]);
        $user->setUserEmail($params["user_email"]);
        $user->setUserDob($params["user_dob"]);
        $user->setUserPhoneNumber($params["user_phone_number"]);
        $user->setUserAddress($params["user_address"]);
        $user->setUserPostcode($params["user_postcode"]);
        $user->setUserCity($params["user_city"]);
        $user->setUserMotivation($params["user_motivation"]);
        $user->setUserCv($params["user_cv"]);
        
        $em = $this->getEntityManager();
        $em->persist($user);
        $em->flush();
    }
}
