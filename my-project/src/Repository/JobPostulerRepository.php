<?php

namespace App\Repository;

use App\Entity\JobPostuler;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobPostuler|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobPostuler|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobPostuler[]    findAll()
 * @method JobPostuler[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobPostulerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobPostuler::class);
    }

    // /**
    //  * @return JobPostuler[] Returns an array of JobPostuler objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JobPostuler
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
