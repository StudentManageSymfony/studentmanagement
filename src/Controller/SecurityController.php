<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/index", name="Index")
     */
    public function loginWithIndexPage(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('main/index.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
        //có ng đã đăng nhập rồi, nếu đăng nhập nữa thì sẽ báo là phải logout mới có thể login 
    }

    
    

    /**
     * @Route("/logout", name="Logout")
     */
    public function logoutAction(): Response
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}
