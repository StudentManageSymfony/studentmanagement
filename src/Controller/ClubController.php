<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
    * @Route("/clubs", name="Club")
    */
    public function showClubAction(): Response
    {
        return $this->render('main/clubs.html.twig', []);
    }
}
