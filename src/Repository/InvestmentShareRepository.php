<?php

namespace App\Repository;

use App\Entity\InvestmentShare;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvestmentShare|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvestmentShare|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvestmentShare[]    findAll()
 * @method InvestmentShare[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvestmentShareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvestmentShare::class);
    }

    // /**
    //  * @return InvestmentShare[] Returns an array of InvestmentShare objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InvestmentShare
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
