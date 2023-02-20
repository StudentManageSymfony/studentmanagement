<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttendanceController extends AbstractController
{
    /**
     * @Route("/attendance", name="Attendance")
     */
    public function showAttendance(): Response
    {
        return $this->render('main/attendance.html.twig', []);
    }
}
