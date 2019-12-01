<?php

namespace App\DataFixtures;

use App\Entity\Assunto;
use App\Entity\Banca;
use App\Entity\Orgao;
use App\Entity\Questao;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $arrBanca = [
            "AGILIZA Concurso",
            "Bela Vista MS (BELAVISTAMS)",
            "CRECI - SP",
            "DGRH Unicamp",
            "Elen Consultoria",
            "Fundação Geraldo Perlingeiro Abreu (FGPA)",
            "Gran Cursos Online (Simulados GCO)",
            "Humanus Treinamento",
        ];

        $arrBancaEntity = [];

        foreach ($arrBanca as $nomeBanca) {
            $banca = new Banca();
            $banca->setNome($nomeBanca);
            $manager->persist($banca);
            $arrBancaEntity[] = $banca;
        }

        $arrOrgao = [
            "Associação Pró-Gestão das Águas da Bacia Hidrográfica do Rio Paraíba do Sul - RJ (AGEVAP/RJ)",
            "Banco de Brasília - 1º Simulado - DF (BRB/DF)",
            "Companhia de Desenvolvimento Agrícola de Santa Catarina - SC (CIDASC/SC)",
            "Departamento de Controle do Espaço Aéreo (DECEA)",
            "Excluir - RJ",
            "Financiadora de Estudos e Projetos (FINEP)",
            "Grande Recife Consórcio de Transporte - PE (GRTC/PE)",
            "Hospital Américo Brasiliense - Técnico em Enfermagem - SP",
        ];

        $arrOrgaoEntity = [];

        foreach ($arrOrgao as $nomeOrgao) {
            $orgao = new Orgao();
            $orgao->setNome($nomeOrgao);
            $manager->persist($orgao);
            $arrOrgaoEntity[] = $orgao;
        }

        $arrAssunto = [
            "DIREITO ADMINISTRATIVO" => [
                "Fontes do Direito Administrativo/Direito Público",
                "Estado, governo e administração pública",
                "Administração Pública " => [
                    "Geral" => [
                        "Administração em Sentido Objetivo",
                        "Administração em Sentido Subjetivo",
                        "Noção de Centralização e Descentralização e Desconcentração",
                        "Conceito de Administração Direta, Indireta e Entidades Paraestatais",
                    ]
                ],
            ],
            "LÍNGUA PORTUGUESA" => [
                "Língua Portuguesa e Ensino",
                "Literatura",
                "Redação oficial",
                "Fonologia" => [
                    "Fonologia" => [
                        "Fonemas e Letras",
                        "Classificação dos Fonemas",
                    ],
                    "Ortografia " => [
                        "Acentuação Gráfica" => [
                            "Acentuação dos Monossílabos",
                            "Acentuação dos Vocábulos Oxítonos"
                        ]
                    ]
                ],
            ]
        ];

        $this->salvarAssuntos($arrAssunto, $manager);
        $manager->flush();

        $arrAssuntoEntity = $manager->getRepository(Assunto::class)->findAll();

        $this->salvarQuestoes($arrBancaEntity, $arrOrgaoEntity, $arrAssuntoEntity, $manager);

        $manager->flush();
    }

    /**
     * @param array $arrAssunto
     * @param ObjectManager $manager
     * @param null $assuntoPai
     */
    private function salvarAssuntos(array $arrAssunto, ObjectManager $manager, $assuntoPai = null): void
    {
        foreach ($arrAssunto as $assuntoPaiNome => $assuntoItem) {
            $assunto = new Assunto();
            $nomeAssunto = is_array($assuntoItem) ? $assuntoPaiNome : $assuntoItem;
            $assunto->setNome($nomeAssunto);

            if($assuntoPai) {
                $assunto->setAssuntoPai($assuntoPai);
            }

            $manager->persist($assunto);

            if(is_array($assuntoItem)) {
                $this->salvarAssuntos($assuntoItem, $manager, $assunto);
            }
        }
    }

    private function salvarQuestoes(array $arrBancaEntity, array $arrOrgaoEntity, array $arrAssuntoEntity, ObjectManager $manager)
    {
        foreach ($arrAssuntoEntity as $assunto) {
            /** @var Assunto $assunto */
            $qtdDeQuestoes = mt_rand(1000, 1500);
            $this->salvarQuestoesPorAssunto($arrBancaEntity, $arrOrgaoEntity, $assunto, $qtdDeQuestoes, $manager);
        }
    }

    private function salvarQuestoesPorAssunto(array $arrBancaEntity, array $arrOrgaoEntity, Assunto $assunto, int $qtdDeQuestoes, ObjectManager $manager)
    {
        for ($numQuestao = 0; $numQuestao < $qtdDeQuestoes; $numQuestao++) {
            $this->salvarQuestaoPorAssunto($arrOrgaoEntity, $arrBancaEntity, $assunto, $numQuestao, $manager);
        }
    }

    private function salvarQuestaoPorAssunto(array $arrOrgaoEntity, array $arrBancaEntity, Assunto $assunto, int $numQuestao, ObjectManager $manager)
    {
        $qtdDeOrgaosEbancas = sizeof($arrBancaEntity);

        for ($posicaoBancaEOrgao = 0; $posicaoBancaEOrgao < $qtdDeOrgaosEbancas; $posicaoBancaEOrgao++) {
            $podeExecutarInsert = (mt_rand(0, 999999) % 2);

            if($podeExecutarInsert) {
                /** @var Banca $banca */
                $banca = $arrBancaEntity[$posicaoBancaEOrgao];
                /** @var Orgao $orgao */
                $orgao = $arrOrgaoEntity[$posicaoBancaEOrgao];

                $questao = new Questao();
                $questao->setNome("Questão - {$banca->getId()} - {$orgao->getId()} - {$numQuestao}");
                $questao->setAssunto($assunto);
                $questao->setBanca($banca);
                $questao->setOrgao($orgao);
                $manager->persist($questao);
            }
        }
    }
}
