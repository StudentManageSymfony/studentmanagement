<?php

namespace App\Controller;

use App\Entity\CheckIn;
use App\Form\CheckInType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckinController extends AbstractController
{
    /**
     * @Route("/check-in", name="Check-in")
     */
    public function showCheckin(Request $req): Response
    {
        $checkIn = new CheckIn();
        $form = $this->createForm(CheckInType::class, $checkIn);
        $form->handleRequest($req);
        
        if($form->isSubmitted()&&$form->isValid()){
            $getAccId = $req->request->get("studentId");
            $getAcvitiesId = $checkIn->getActivities(); 

            return $this->json($getAcvitiesId);
        }
        return $this->render('main/check-in.html.twig', ['form'=>$form->createView()]);
    }
}
