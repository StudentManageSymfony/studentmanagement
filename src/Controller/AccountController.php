<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="Account")
     */
    public function showAccount(): Response
    {
        return $this->render('main/account.html.twig', []);
    }

    /**
     * @Route("/addingaccount", name="AddAcc")
     */
    public function addingAccount(): Response
    {
        return $this->render('main/adding-account.html.twig', []);
    }
}
