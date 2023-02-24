<?php

namespace App\Controller;

use App\Entity\Account;
use App\Form\AccountFormPhpType;
use App\Repository\AccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account/{email}", name="Account")
     */
    public function showAccount(AccountRepository $repo, $email): Response
    {
        $acc = $repo->findAllByEmail($email);
        return $this->render('main/account.html.twig', ['account'=>$acc]);
    }

    // /**
    //  * @Route("/acc/{id}", name="Acc")
    //  */
    // public function FunctionName(string $id, AccountRepository $repo): Response
    // {
    //     $acc = $repo->findAccountId($id);
    //     return $this->json($acc);
    // }

    // /**
    //  * @Route("/email/{email}", name="Email")
    //  */
    // public function FunctionName(string $email, AccountRepository $repo): Response
    // {
    //     $email = $repo->findAllByEmail($email);
    //     return $this->json($email);
    // }


    

}
