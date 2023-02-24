<?php

namespace App\Controller;

use App\Repository\ClubsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("homepage", name="Homepage")
     */
    public function showHomepageAction(ClubsRepository $repo): Response
    {
        $showClub = $repo->findAll();
        return $this->render('main/homepage.html.twig', ['showClub'=>$showClub]);
    }
}
