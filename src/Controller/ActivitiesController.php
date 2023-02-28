<?php

namespace App\Controller;

use App\Entity\Activities;
use App\Form\ActivitiesFormType;
use App\Repository\ActivitiesRepository;
use App\Repository\ClubsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Validator\Constraints\Time;

class ActivitiesController extends AbstractController
{
    /**
     * @Route("/activities", name="Activities")
     */
    public function showListActivities(ActivitiesRepository $activitiesRepo): Response
    {
        $showActivities = $activitiesRepo->findActivitiesWithClubName();

        $getCurrentDate = new \DateTime;
        $getCurrentTime = new Time;
        return $this->render('main/activities.html.twig', ['activity'=>$showActivities, 'currentDate'=>$getCurrentDate, 'currentTime'=>$getCurrentTime]);
        // return $this->json($showActivities);
    }


    /**
     * @Route("/adding-activities", name="AddingActivities")
     */
    public function addingActivities(ActivitiesRepository $repo, Request $req, SluggerInterface $slugger): Response
    {
        $addActivities = new Activities();
        $form = $this->createForm(ActivitiesFormType::class, $addActivities);

        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){

            $imgFile = $form->get('file')->getData();

            //return a object with club
            $clubId = $addActivities->getClub();

            $addActivities->setClub($clubId);
            if($imgFile){
                $newFileName = $this->uploadImage($imgFile, $slugger);
                $addActivities->setImage($newFileName);
            }
            // return $this->json($clubId);
            $repo->save($addActivities, true);
            return $this->redirectToRoute('Activities', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('main/adding-activities.html.twig', ['form'=>$form->createView()]);
    }



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

    /**
     * @Route("/editActivities/{id}", name="EditActivities")
     */
    public function editActivitiesAction(ActivitiesRepository $repo, Request $req, Activities $id, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(ActivitiesFormType::class, $id);

        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $imgFile = $form->get('file')->getData();
            $clubId = $id->getClub();

            $id->setClub($clubId);
            if($imgFile){
                $newFileName = $this->uploadImage($imgFile, $slugger);
                $id->setImage($newFileName);
            }
            $repo->save($id, true);
            return $this->redirectToRoute('Activities', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('main/adding-activities.html.twig', ['form'=>$form->createView()]);
    }



    /**
     * @Route("/deleteActivities/{id}", name="DeleteActivities")
     */
    public function deleteActivitiesAction(ActivitiesRepository $repo, Request $req, Activities $id): Response
    {
        
            $repo->remove($id, true);
            return $this->redirectToRoute('Activities', [], Response::HTTP_SEE_OTHER);
            $id->getId();
    }

}
