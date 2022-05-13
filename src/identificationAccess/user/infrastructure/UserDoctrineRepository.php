<?php declare(strict_types=1);


namespace Siccob\identificationAccess\user\infrastructure;


use Siccob\identificationAccess\user\domain\User;
use Siccob\identificationAccess\user\domain\UserNickname;
use Siccob\identificationAccess\user\domain\UserRepository;
use Siccob\shared\infrastructure\doctrine\DoctrineRepository;
use Doctrine\ORM\EntityManager;
use Exception;


final class UserDoctrineRepository extends DoctrineRepository implements UserRepository
{

    public function __construct(EntityManager $ADISTEntityManager)
    {
        parent::__construct($ADISTEntityManager);
    }

    public function searchNickname(UserNickname $nickname): ?User
    {
        $queryBuilder = $this->repository(User::class)->createQueryBuilder('u');
        $queryBuilder->select('u')
            ->where($queryBuilder->expr()->orX(
                $queryBuilder->expr()->eq('u.nickname.value' , ':nickname') ,
                $queryBuilder->expr()->eq('u.email.value' , ':nickname') ,
                $queryBuilder->expr()->eq('u.corporateEmail.value' , ':nickname')
            ))
            ->setParameter('nickname' , $nickname->value());

        try {
            return $queryBuilder->getQuery()->getSingleResult();
        } catch (Exception $exception) {
            return null;
        }
    }
}