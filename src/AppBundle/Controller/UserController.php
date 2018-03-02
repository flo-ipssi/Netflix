<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Manager\UserManager;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends Controller
{


    /**
     * @Route("/register", name="register")
     */
    public function indexRegistration(Request $request, UserManager $userManager)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();
            $userManager->createUser($user);
            return $this->redirectToRoute('login');
        }
        return $this->render('user/user-add.html.twig', [
            'form' => $form->createView()
        ]);
    }



    /**
     * @Route("/sign-in", name="login")
     */
    public function loginAction(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();
        return $this->render('default/login.html.twig', [
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



    /**
     * @Route("/admin/user/{id}", name="user-view", requirements={"id"="\d+"})
     */
    public function viewAction(UserManager $userManager, $id)
    {
        $user = $userManager->getUser($id);

        if(!empty($user)){
            return $this->render('admin/account_all.html.twig', [
                'user' => $user
            ]);
        }
        else{
            throw new BadRequestHttpException( '404, Project not found.');
        }
    }


    /**
     * @Route("/user/edit", name="user_edit")
     */
    public function edituserAction(UserManager $userManager, Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();
            $userManager->createUser($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('profil');
        }

        return $this->render('user/edit_account.html.twig', [ 'form' => $form->createView()
        ]);
    }






    /**
     * @Route("/profil", name="profil")
     */
    public function profileAction()
    {
        $user = $this->getUser();
        if ($user == null) {
            throw new NotFoundHttpException('404, Utilisateur non trouvé');
        }
        return $this->render('user/account.html.twig', [
            'user' => $user
        ]);
    }

}