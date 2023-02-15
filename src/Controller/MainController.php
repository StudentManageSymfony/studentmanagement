<?php

namespace App\Controller;

use App\Entity\index;
use App\Form\IndexFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    // /**
    //  * @Route("/index", name="indexPage")
    //  */
    // public function IndexPage(Request $req): Response
    // {
    //     //Mặc định phương thức method="Post"
    //     $index = new index();
    //     $indexForm = $this->createForm(IndexFormType::class, $index);

    //     $indexForm ->handleRequest($req);
    //     if($indexForm->isSubmitted() && $indexForm->isValid()){
    //     //     //Option 1
    //     //     // $data = $noteForm->getData();
    //     //     // $created = $data->getCreated();

    //     //     //option 2
    //     //     // $created = $note->getCreated();
    //     //     // if($created==null){
    //     //     //     $created = new DateTime();
    //     //     // }

    //     //     // $createdNew = $created->format("d/m/Y H:i");
    //     //     //Return sau khi bấm nút save
    //         return $this->render('main/homepage.html.twig', ['index'=>$index]);
    //     }

    //     //Return trước khi bấm nút save
    //     return $this->render('main/index.html.twig', ['index_form'=> $indexForm->createView()]);
    // }




    /**
     * @Route("/index", name="Index")
     */
    public function showIndexAction(): Response
    {
        return $this->render('main/index.html.twig', []);
    }
}
