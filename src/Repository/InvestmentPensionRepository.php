<?php

namespace App\Repository;

use App\Entity\InvestmentPension;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvestmentPension|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvestmentPension|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvestmentPension[]    findAll()
 * @method InvestmentPension[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvestmentPensionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvestmentPension::class);
    }

    // /**
    //  * @return InvestmentPension[] Returns an array of InvestmentPension objects
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
    public function findOneBySomeField($value): ?InvestmentPension
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
