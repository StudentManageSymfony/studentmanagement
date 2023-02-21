<?php

namespace App\Controller;

use App\Entity\Clubs;
use App\Form\ClubType;
use App\Repository\ClubsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
    * @Route("/clubs", name="Club")
    */
    public function showClubListAction(ClubsRepository $repo): Response
    {
        $club = $repo->findAll();

        return $this->render('main/clubs.html.twig', ['club'=>$club]);
    }

    /**
     * @Route("/adding-clubs", name="Adding-clubs")
     */
    public function addingClubAction(ClubsRepository $repo, Request $req): Response
    {
        $addClub = new Clubs();
        $form = $this->createForm(ClubType::class, $addClub);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $repo->save($addClub, true);
            return new Response("Added Successfully".$addClub->getId());
        }
        return $this->render('main/adding-clubs.html.twig', ['form'=>$form->createView()]);
    }
}
