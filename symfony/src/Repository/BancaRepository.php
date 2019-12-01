<?php

namespace App\Repository;

use App\Entity\Banca;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Banca|null find($id, $lockMode = null, $lockVersion = null)
 * @method Banca|null findOneBy(array $criteria, array $orderBy = null)
 * @method Banca[]    findAll()
 * @method Banca[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BancaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Banca::class);
    }
}
