<?php

namespace App\Repository;

use App\Entity\InvestmentAccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvestmentAccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvestmentAccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvestmentAccount[]    findAll()
 * @method InvestmentAccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvestmentAccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvestmentAccount::class);
    }

    // /**
    //  * @return InvestmentAccount[] Returns an array of InvestmentAccount objects
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
    public function findOneBySomeField($value): ?InvestmentAccount
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
