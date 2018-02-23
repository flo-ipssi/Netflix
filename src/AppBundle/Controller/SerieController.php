<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Serie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SerieController extends Controller
{
    /**
     * @Route("/series", name="series")
     */
    public function listSerie()
    {
        $em = $this->getDoctrine()->getManager();
        $series = $em->getRepository(Serie::class)->findAll();

        return $this->render('user/series.html.twig',[
            'series' => $series
        ]);
    }
}
