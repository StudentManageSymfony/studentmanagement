<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("homepage", name="Homepage")
     */
    public function showHomepageAction(): Response
    {
        return $this->render('main/homepage.html.twig', []);
    }
}
