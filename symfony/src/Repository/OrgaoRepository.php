<?php

namespace App\Repository;

use App\Entity\Orgao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Orgao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Orgao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Orgao[]    findAll()
 * @method Orgao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrgaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Orgao::class);
    }

    // /**
    //  * @return Orgao[] Returns an array of Orgao objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Orgao
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
