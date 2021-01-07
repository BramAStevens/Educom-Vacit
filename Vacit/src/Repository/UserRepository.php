<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements
    PasswordUpgraderInterface
{
    public function __construct(
        ManagerRegistry $registry,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        parent::__construct($registry, User::class);

        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(
        UserInterface $user,
        string $newEncodedPassword
    ): void {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf(
                    'Instances of "%s" are not supported.',
                    \get_class($user)
                )
            );
        }

        $user->setPassword($newEncodedPassword);

        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function saveUser($params)
    {
        
        $user = new User();
        $user->setUsername($params['username']);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'password'));
        

        if (isset($params['roles'])) {
            $user->setRoles(['ROLE_EMPLOYER']);
        } else {
            $user->setRoles(['ROLE_CANDIDATE']);
        }

        $em = $this->getEntityManager();
        $em->persist($user);
        $em->flush();

        return($user);
    }

    public function updateUserProfile($params) {

        $user = $this->find($params['id']);
      
        $user->setUserPicture($params['user_picture']);
        $user->setUserSurname($params['user_surname']);
        $user->setUserLastname($params['user_lastname']);
        $user->setUserEmail($params['user_email']);
        $user->setUserDob($params['user_dob']);
        $user->setUserPhoneNumber($params['user_phone_number']);
        $user->setUserAddress($params['user_address']);
        $user->setUserPostcode($params['user_postcode']);
        $user->setUserCity($params['user_city']);
        $user->setUserMotivation($params['user_motivation']);
        $user->setUserCv($params['user_cv']);

        $em = $this->getEntityManager();
        $em->persist($user);
        $em->flush();

        return($user);
    }

    public function getAllUsers()
    {
        $users = $this->findAll();
        return $users;
    }

    public function findUserByUsername($username)
    {
        $user = $this->findOneBy(["username" => $username]);
        return $user;
    }

    public function findUserById($id)
    {
        $user = $this->find($id);
        return($user);
    }

    public function deleteUser($id)
    {
        $user = $this->find($id);
        $em = $this->getEntityManager();
        $em->remove($user);
        $em->flush();
        return("User removed successfully!");
    }
}
