<?php

namespace App\Controller;

use App\Repository\CheckInRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttendanceController extends AbstractController
{
    /**
     * @Route("/attendance", name="Attendance")
     */
    public function showAttendance(CheckInRepository $repo): Response
    {
        $showAttendence = $repo->showCheckInPage();
        
        return $this->render('main/attendance.html.twig', ['showAttendence'=>$showAttendence]);
    }
}
