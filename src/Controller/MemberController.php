<?php

namespace App\Controller;

use App\Entity\Member;
use App\Form\MemberType;
use App\Repository\AccountRepository;
use App\Repository\ClubsRepository;
use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class MemberController extends AbstractController
{
    /**
     * @Route("/members", name="Members")
     */
    public function showListMember(): Response
    {
        return $this->render('main/members.html.twig', []);
    }


    // /**
    //  * @Route("/adding-members", name="Adding-members")
    //  */
    // public function addingMemberAction(MemberRepository $repo, Request $req, SluggerInterface $slugger): Response
    // {
    //     // $member = new Member();
    //     // $form = $this->createForm(MemberType::class, $member);

    //     // $form->handleRequest($req);
    //     // if($form->isSubmitted()&&$form->isValid()){
    //     //     $imgFile = $form->get('file')->getData();
    //     //     if($imgFile){
    //     //         $newFileName = $this->uploadImage($imgFile, $slugger);
    //     //         $member->setImage($newFileName);
    //     //     }
    //     //     $repo->save($member, true);
    //     //     return $this->redirectToRoute('Members', [], Response::HTTP_SEE_OTHER);
    //     // }
    //     return $this->render('main/adding-members.html.twig',);
    //     //['form'=>$form->createView()]
    // }

    /**
     * @Route("/checkMember", name="CheckMember")
     */
    public function checkMember(MemberRepository $repo,Request $req): Response
    {
        if($req->query->get('memberId')!=null){
        $getDataMember = $req->query->get("memberId");
        // $getDataClub = $req->query->get("clubName");
        $test = $repo->checkStudentId($getDataMember);
        if(count($test)!=0){
            $error = "Your student ID is valuable";
            return $this->render('main/check-members.html.twig', [
                'error'=>$error
            ]);      
        }else{
            return $this->redirectToRoute('addMember', ['id'=>$getDataMember], Response::HTTP_SEE_OTHER);
        }
        }else 
        return $this->render('main/check-members.html.twig', []);
    }

    // /**
    //  * @Route("/adding-members/{id}", name="addMember")
    //  */
    // public function addMember(string $id, Request $req, AccountRepository $accId, ClubsRepository $clubId): Response
    // {

        
    //     return $this->render('main/adding-members.html.twig', []);
    // }



    /**
     * @Route("/adding-members/{id}", name="addMember")
     */
    public function addingMemberAction(MemberRepository $repo, Request $req, SluggerInterface $slugger, AccountRepository $accId, ClubsRepository $clubsID): Response
    {
        $member = new Member();
        $form = $this->createForm(MemberType::class, $member);

        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){

            //get data from Form
            $getAccountId = $req->query->get("StudentId");
            $getClubId = $req->query->get("ClubName");
            //get ID 
            $accountId = $accId->findAccountId( $getAccountId);
            $clubId = $clubsID->findClubId($getClubId);


            $imgFile = $form->get('file')->getData();
            if($imgFile){
                $newFileName = $this->uploadImage($imgFile, $slugger);
                $member->setImage($newFileName);
            }
            $repo->save($member,$accountId, $clubId, true);
            return $this->redirectToRoute('Members', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('main/adding-members.html.twig',['form'=>$form->createView()]);
        //['form'=>$form->createView()]
    }



    //function to rename image file and upload it to images folder
    public function uploadImage($imgFile, SluggerInterface $slugger):?string{
        $originalFileName = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFileName = $slugger->slug($originalFileName);
        $newFileName = $safeFileName.'-'.uniqid().'.'.$imgFile->guessExtension();
        try{
            $imgFile->move(
                $this->getParameter('image_dir'),
                $newFileName
            );
        }catch(FileException $e){
            echo $e;
        }
        return $newFileName;
    }


}
