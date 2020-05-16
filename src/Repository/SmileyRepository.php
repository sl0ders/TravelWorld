<?php

namespace App\Repository;

use App\Entity\Smiley;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Smiley|null find($id, $lockMode = null, $lockVersion = null)
 * @method Smiley|null findOneBy(array $criteria, array $orderBy = null)
 * @method Smiley[]    findAll()
 * @method Smiley[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SmileyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Smiley::class);
    }

    // /**
    //  * @return Smiley[] Returns an array of Smiley objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Smiley
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
