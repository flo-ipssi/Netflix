<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Entity\Category;
use AppBundle\Manager\FilmManager;
use AppBundle\Manager\UserManager;
use AppBundle\Repository\FilmsRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\SecurityBundle\Tests\Functional\Bundle\CsrfFormLoginBundle\Form\UserLoginType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
   public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
  //      return $this->render('default/index.html.twig', [
      //      'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
   //     ]);
        return $this->redirect($this->generateUrl('films'));
    }



    public function menuAction()
    {
        $tab = array("series", "films", "profil");
        return $this->render('templates/menu.html.twig', [
            'tab' => $tab
        ]);
    }




    /**
     * @Route("/account_all", name="user_info")
     */
    public function listAction(UserManager $userManager)
    {
        $user = $userManager->getUsers();

        return $this->render('user/account.html.twig', [
            'user' => $user
        ]);
    }



    public function searchBarAction()
    {
        $form = $this->createFormBuilder()
            ->add('name',TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Recherche'
                )))
            ->add('Ok',SubmitType::class)
            ->setAction($this->generateUrl('search'))
            ->getForm();
        return $this->render('templates/search-bar.html.twig',
            [
                'form' => $form->createView()
            ]);
    }
    /**
     * @Route("search", name="search")
     * @param Request $request
     * @param FilmManager $filmManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function searchFilms(Request $request, FilmManager $filmManager)
    {
        $em = $this->getDoctrine()->getManager();
        $search = $request->request->get('form')['name'];
        $films = $filmManager->search($search);
        $categories = $em->getRepository(Category::class)->findAll();
        return $this->render('media/films.html.twig', [
            'films' => $films,
            'categories' => $categories
        ]);
    }



}