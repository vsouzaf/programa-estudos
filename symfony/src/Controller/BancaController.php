<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("api/banca", name="api_banca")
 */
class BancaController extends AbstractController
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
        return $this->json([], Response::HTTP_OK);
    }

}