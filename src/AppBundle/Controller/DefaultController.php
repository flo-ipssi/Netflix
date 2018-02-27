<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Manager\UserManager;
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
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }





    /**
     * @Route("/account_all", name="user_info")
     */
    public function listAction(UserManager $userManager)
    {
        $user = $userManager->getUsers();

        return $this->render('default/account.html.twig', [
            'user' => $user
        ]);
    }



}
