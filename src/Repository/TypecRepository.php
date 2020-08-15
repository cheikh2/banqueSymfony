<?php

namespace App\Repository;

use App\Entity\Typec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typec|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typec|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typec[]    findAll()
 * @method Typec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypecRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typec::class);
    }

    // /**
    //  * @return Typec[] Returns an array of Typec objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typec
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
