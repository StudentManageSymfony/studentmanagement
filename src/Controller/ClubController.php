<?php

namespace App\Controller;

use App\Entity\Clubs;
use App\Form\ClubType;
use App\Repository\ClubsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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
    public function addingClubAction(ClubsRepository $repo, Request $req, SluggerInterface $slugger): Response
    {
        $addClub = new Clubs();
        $form = $this->createForm(ClubType::class, $addClub);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){

            $imgFile = $form->get('file')->getData();
            if($imgFile){
                $newFileName = $this->uploadImage($imgFile, $slugger);
                $addClub->setImage($newFileName);
            }


            $repo->save($addClub, true);
            return $this->redirectToRoute('Club');
        }
        return $this->render('main/adding-clubs.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/editClub/{id}", name="EditClub")
     */
    public function editClubAction(ClubsRepository $repo, Request $req, Clubs $id, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(ClubType::class,$id);
        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $imgFile = $form->get('file')->getData();
            if($imgFile){
                $newFileName = $this->uploadImage($imgFile, $slugger);
                $id->setImage($newFileName);
            }
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


    //function to rename image file and upload it to images folder
    public function uploadImage($imgFile, SluggerInterface $slugger):?string{
        $originalFileName = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFileName = $slugger->slug($originalFileName);
        $newFileName = $safeFileName.'-'.uniqid().'.'.$imgFile->guessExtension();
        try{
            $imgFile->move(
                $this->getParameter('image_dir'),
                $newFileName
            );
        }catch(FileException $e){
            echo $e;
        }
        return $newFileName;
    }
}
