<?php

namespace App\Controller;

use App\Repository\AccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="Account")
     */
    public function showListAccount(): Response
    {
        return $this->render('main/account.html.twig', []);
    }

    // /**
    //  * @Route("/acc/{id}", name="Acc")
    //  */
    // public function FunctionName(string $id, AccountRepository $repo): Response
    // {
    //     $acc = $repo->findAccountId($id);
    //     return $this->json($acc);
    // }
}
