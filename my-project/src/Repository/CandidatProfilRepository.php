<?php

namespace App\Repository;

use App\Entity\CandidatProfil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CandidatProfil|null find($id, $lockMode = null, $lockVersion = null)
 * @method CandidatProfil|null findOneBy(array $criteria, array $orderBy = null)
 * @method CandidatProfil[]    findAll()
 * @method CandidatProfil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidatProfilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CandidatProfil::class);
    }

    // /**
    //  * @return CandidatProfil[] Returns an array of CandidatProfil objects
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
    public function findOneBySomeField($value): ?CandidatProfil
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
