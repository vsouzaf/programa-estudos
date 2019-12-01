<?php

namespace App\Controller;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("api/orgao", name="api_orgao")
 */
class OrgaoController extends AbstractController
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
        return $this->json([["teste" => "teste"]], Response::HTTP_OK);
    }

}