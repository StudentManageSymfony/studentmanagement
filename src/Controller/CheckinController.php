<?php

namespace App\Controller;

use App\Entity\Account;
use App\Entity\CheckIn;
use App\Form\CheckInType;
use App\Repository\AccountRepository;
use App\Repository\ActivitiesRepository;
use App\Repository\CheckInRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckinController extends AbstractController
{
    /**
     * @Route("/check-in", name="Check-in")
     */
    public function showCheckin(Request $req, AccountRepository $accRepo, ActivitiesRepository $Activirepo, CheckInRepository $repo, ManagerRegistry $reg): Response
    {
        $checkIn = new CheckIn();
        $showCheckIn = $repo->showCheckInPage();
        $form = $this->createForm(CheckInType::class, $checkIn);
        $form->handleRequest($req);
        
        
        if($form->isSubmitted()&&$form->isValid()){
            //get student id from Form
            $getStudentId = $req->request->get("studentId");
            //get
            // $getAccId = $accRepo->findOneBy(['studenId' => $getStudentId]);

            //get object from 
            $accId = $reg->getRepository(Account::class)->findOneBy(['studenId' => $getStudentId]);
            if($accId == null){
                $error = "Student id does not exist!!!";
                return $this->render('main/check-in.html.twig', ['error'=>$error, 'form'=>$form->createView(), 'showCheck'=>$showCheckIn]);
            }

            $getActivitiesName = $checkIn->getActivities()->getId(); 
            $getActivitiesId = $Activirepo->findOneBy(['id' => $getActivitiesName]);

            
            // settype($getActivitiesName, "?Activities");

            $checkIn->setAccount($accId);
            $checkIn->setActivities($getActivitiesId);

            $repo->save($checkIn, true);
            return $this->redirectToRoute('Check-in', [], Response::HTTP_SEE_OTHER);

            // return $this->json($getAccId);
        }
        return $this->render('main/check-in.html.twig', ['form'=>$form->createView(), 'showCheck'=>$showCheckIn]);
    }
}
