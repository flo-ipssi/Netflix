<?php

// src/AppBundle/Controller/SecurityController.php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class SecurityController extends Controller
{
    /**
     * @Route("/sign-in", name="login")
     */
    public function loginAction(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername ,
            'error' => $error
        ]);
    }


    /**
     * @Route("/sign-out", name="logout")
     */
    public function logoutAction()
    {
        // Nothing to do here
    }

}