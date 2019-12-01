<?php

namespace App\Controller;

use App\Entity\Orgao;
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
     * @return View
     */
    public function getList(Request $request)
    {
        $list = $this->getDoctrine()->getRepository(Orgao::class)->findAll();
        return View::create($list, Response::HTTP_OK);
    }

}