<?php

namespace App\Controller;

use App\Entity\Questao;
use App\Repository\QuestaoRepository;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("api/programa_estudo", name="api_programa_estudo")
 */
class ProgramaEstudoController extends AbstractController
{
    /**
     * Serviço responsável por retornar a lista de Bancas
     *
     * @Rest\Get("/", name="_lista")
     * @param Request $request
     * @return Response
     */
    public function getList(Request $request)
    {
        $programaDeEstudo = $this->criarProgramaDeEstudos($request);
        return $this->json($programaDeEstudo, Response::HTTP_OK);
    }

    private function criarProgramaDeEstudos(Request $request)
    {
        /** @var QuestaoRepository $questaoRepository */
        $questaoRepository = $this->getDoctrine()->getRepository(Questao::class);

        $bancaId = $request->get("banca");
        $orgaoId = $request->get("orgao");

        $arrAssunto = $questaoRepository->getQuantidadeAgrupadaPorAssunto($bancaId,
            $orgaoId);

        return $this->getArvoreAssuntos($arrAssunto);
    }

    private function getArvoreAssuntos(array $arrAssunto, $assuntoPaiId = null)
    {
        $arrArvoreAssuntos = [];
        foreach ($arrAssunto as $assunto) {
            if($assuntoPaiId == $assunto['assunto_pai_id']) {
                $arvoreAssuntoItem = $assunto;
                $arvoreAssuntoItem['sub_itens'] = $this->getArvoreAssuntos($arrAssunto, $assunto['assunto_id']);
                $arrArvoreAssuntos[] = $arvoreAssuntoItem;
            }
        }

        return $arrArvoreAssuntos;
    }
}