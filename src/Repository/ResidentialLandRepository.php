<?php

namespace App\Repository;

use App\Entity\ResidentialLand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ResidentialLand|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResidentialLand|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResidentialLand[]    findAll()
 * @method ResidentialLand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResidentialLandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResidentialLand::class);
    }

    // /**
    //  * @return ResidentialLand[] Returns an array of ResidentialLand objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResidentialLand
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
