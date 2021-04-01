<?php

namespace App\Repository;

use App\Entity\CandidatEvaluation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CandidatEvaluation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CandidatEvaluation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CandidatEvaluation[]    findAll()
 * @method CandidatEvaluation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidatEvaluationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CandidatEvaluation::class);
    }

    // /**
    //  * @return CandidatEvaluation[] Returns an array of CandidatEvaluation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CandidatEvaluation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
