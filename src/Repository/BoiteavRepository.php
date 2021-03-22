<?php

namespace App\Repository;

use App\Entity\Boiteav;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Boiteav|null find($id, $lockMode = null, $lockVersion = null)
 * @method Boiteav|null findOneBy(array $criteria, array $orderBy = null)
 * @method Boiteav[]    findAll()
 * @method Boiteav[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoiteavRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Boiteav::class);
    }

    // /**
    //  * @return Boiteav[] Returns an array of Boiteav objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Boiteav
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
