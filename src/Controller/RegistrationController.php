<?php

namespace App\Controller;

use App\Entity\Account;
use App\Form\AccountFormPhpType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/addingaccount", name="AddAcc")
     */
    public function register(Request $req, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $account = new Account();
        $form = $this->createForm(AccountFormPhpType::class, $account);
        $form->handleRequest($req);

        if($form->isSubmitted()&&$form->isValid()){
            $account->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('')
                )
            );
        }
        return $this->render('$0.html.twig', []);
    }
}
