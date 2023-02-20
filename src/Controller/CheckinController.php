<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckinController extends AbstractController
{
    /**
     * @Route("/check-in", name="Check-in")
     */
    public function showCheckin(): Response
    {
        return $this->render('main/check-in.html.twig', []);
    }
}
