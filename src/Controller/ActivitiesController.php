<?php

namespace App\Controller;

use App\Entity\Activities;
use App\Form\ActivitiesFormType;
use App\Repository\ActivitiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function addingActivities(ActivitiesRepository $repo, Request $req): Response
    {
        $addActivities = new Activities();
        $form = $this->createForm(ActivitiesFormType::class, $addActivities);

        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){
            $repo->save($addActivities, true);
            return new Response("Successfull Added".$addActivities->getId());
        }
        return $this->render('main/adding-activities.html.twig', ['form'=>$form->createView()]);
    }



}
