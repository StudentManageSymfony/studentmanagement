<?php

namespace App\Controller;

use App\Entity\Account;
use App\Repository\AccountRepository;
use App\Repository\CheckInRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttendanceController extends AbstractController
{
    /**
     * @Route("/attendance/{email}", name="Attendance")
     */
    public function showAttendance(string $email, AccountRepository $repo, CheckInRepository $checkInRepo): Response
    {
        $getObjAccount = $repo->findOneBy(['email'=>$email]);
        $getRole = [];
        $getRole [] = $getObjAccount->getRoles();
        $getRoleValue = $getRole[0][0];

        if($getRoleValue == "ROLE_USER"){
            $userPage = $checkInRepo->showCheckInPageByEmail($email);
            return $this->render('main/attendance.html.twig', ['showAttendence'=>$userPage]);
        }
        elseif($getRoleValue == "ROLE_ADMIN"){
            $adminPage = $checkInRepo->showCheckInPage();
            return $this->render('main/attendance.html.twig', ['showAttendence'=>$adminPage]);
        }
        return new Response("Error!!!");
    }

    /**
     * @Route("/showScore/{email}", name="Score")
     */
    public function showScoreAction(string $email, AccountRepository $repo, CheckInRepository $checkInRepo): Response
    {
        $getObjAccount = $repo->findOneBy(['email'=>$email]);
        $getRole = [];
        $getRole [] = $getObjAccount->getRoles();
        $getRoleValue = $getRole[0][0];


        if($getRoleValue == "ROLE_USER"){
            $userPage = $checkInRepo->showScorePageByEmail($email);
            return $this->render('main/showing-score.html.twig', ['showScore'=>$userPage]);
        }
        elseif($getRoleValue == "ROLE_ADMIN"){
            $adminPage = $checkInRepo->showScorePage();
            return $this->render('main/showing-score.html.twig', ['showScore'=>$adminPage]);
        }
        return new Response("Error!!!");

        // return $this->json($getRoleValue);
    }
}
