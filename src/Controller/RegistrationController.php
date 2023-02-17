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
                    $account,
                    $form->get('password')->getData()
                )
            );
            $account->setRoles(['ROLE_USER']);

            $entityManager->persist($account);
            $entityManager->flush();

            return $this->redirectToRoute('Index'); 
        }
        return $this->render('main/adding-account.html.twig', 
        [
            'form'=> $form->createView()
        ]);
    }
}
