<?php
/**
 * Created by PhpStorm.
 * User: femmanuel
 * Date: 30/04/2018
 * Time: 12:17
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Favoris;
use AppBundle\Entity\Films;
use AppBundle\Entity\User;
use AppBundle\Entity\Series;
use AppBundle\Form\FavorisType;
use AppBundle\Manager\FilmManager;
use AppBundle\Manager\CategoryManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\SecurityBundle\Tests\Functional\Bundle\CsrfFormLoginBundle\Form\UserLoginType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class FavorisController extends Controller
{
    /** @var EntityManagerInterface */
    private $em;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @Route("/favories", name="favorie_view", requirements={"id"="\d+"})
     */
    public function listFavories()
    {
        $user = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository(Films::class)->findAll();
        $favories = $em->getRepository(Favoris:: class)
            ->findBy(
                array( 'idUser' => $user),
                array( 'id' => 'DESC' )
            );
        return $this->render( 'Media/favories.html.twig', [
            'favories' => $favories,
            'films' => $films
        ]);
    }


    /**
     * @Route("/film/favoris/{id}", name="film-favoris", requirements={"id"="\d+"})
     */
    public function addFilmFavorisAction(FilmManager $filmManager, $id, Request $request)
    {

        $user = $this->getUser();
        $favoris = new Favoris();
        /* Default Values */
        $favoris->setIdUser((int)$user->getId());
        $favoris->setIdWork((int)$id);
        $favoris->setType(1);
        /**********************************/
        $form = $this->createForm(FavorisType:: class, $favoris );
        $form->handleRequest( $request );
        $task = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($task);
        $em->flush();
        return $this->redirectToRoute('film-view', [
            'id' => $id
        ]);
    }

}