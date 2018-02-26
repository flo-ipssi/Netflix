<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FilmController extends Controller
{
    /**
     * @Route("/films", name="films")
     */
    public function listMovies()
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository(Film::class)->findAll();
        return $this->render('user/films.html.twig',[
            'films' => $films
        ]);
    }
}
