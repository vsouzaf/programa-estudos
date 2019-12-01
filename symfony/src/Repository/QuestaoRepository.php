<?php

namespace App\Repository;

use App\Entity\Questao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Questao|null find($id, $lockMode = null, $lockVersion = null)
 * @method Questao|null findOneBy(array $criteria, array $orderBy = null)
 * @method Questao[]    findAll()
 * @method Questao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Questao::class);
    }

    public function getQuantidadeAgrupadaPorAssunto(int $idBanca, int $idOrgao) {
        $sql =  "SELECT 
                        asu.id as assunto_id,
                        asu.nome,
                        asu.assunto_pai_id,
                        count(q.id) as qtd_questoes
                FROM assunto asu
                         INNER JOIN
                     questao q on asu.id = q.assunto_id
                WHERE q.banca_id = {$idBanca}
                  AND q.orgao_id = {$idOrgao}
                GROUP BY asu.id, asu.nome, asu.assunto_pai_id";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
