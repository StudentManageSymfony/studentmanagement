<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActivitiesController extends AbstractController
{
    /**
     * @Route("/activities", name="Activities")
     */
    public function showListActivities(): Response
    {
        return $this->render('main/activities.html.twig', []);
    }


    /**
     * @Route("/adding-activities", name="AddingActivities")
     */
    public function FunctionName(): Response
    {
        return $this->render('main/adding-activities.html.twig', []);
    }

    
}
