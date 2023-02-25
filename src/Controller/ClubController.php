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
            return $this->redirectToRoute('Club');
        }
        return $this->render('main/adding-clubs.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/editClub/{id}", name="EditClub")
     */
    public function editClubAction(ClubsRepository $repo, Request $req, Clubs $id): Response
    {
        $form = $this->createForm(ClubType::class,$id);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $repo->save($id, true);
            return $this->redirectToRoute('Club');
            $id->getId();
        }
        return $this->render('main/adding-clubs.html.twig', ['form'=>$form->createView()]);
    }


    /**
     * @Route("/deleteClub/{id}", name="DeleteClub")
     */
    public function deleteClubAction(ClubsRepository $repo, Clubs $id): Response
    {
            $repo->remove($id, true);
            return $this->redirectToRoute('Club');
            $id->getId();
    }
    
    // /**
    //  * @Route("club/{id}", name="RouteName")
    //  */
    // public function FunctionName(ClubsRepository $repo, string $id): Response
    // {
    //     $club = $repo->findClubId($id);
    //     return $this->json($club);
    // }
}
