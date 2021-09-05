<?php

namespace App\Repository;

use App\Entity\CompositionEquipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompositionEquipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompositionEquipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompositionEquipe[]    findAll()
 * @method CompositionEquipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompositionEquipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompositionEquipe::class);
    }

    // /**
    //  * @return CompositionEquipe[] Returns an array of CompositionEquipe objects
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
    public function findOneBySomeField($value): ?CompositionEquipe
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
