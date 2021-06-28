<?php

namespace App\Repository;

use App\Entity\ArtCollectible;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArtCollectible|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArtCollectible|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArtCollectible[]    findAll()
 * @method ArtCollectible[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtCollectibleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArtCollectible::class);
    }

    // /**
    //  * @return ArtCollectible[] Returns an array of ArtCollectible objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArtCollectible
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
