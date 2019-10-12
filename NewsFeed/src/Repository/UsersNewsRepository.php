<?php

namespace App\Repository;

use App\Entity\UsersNews;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UsersNews|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersNews|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersNews[]    findAll()
 * @method UsersNews[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersNewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersNews::class);
    }

    // /**
    //  * @return UsersNews[] Returns an array of UsersNews objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsersNews
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
