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
            return $this->redirectToRoute('addMember', ['stdID'=>$getDataMember], Response::HTTP_SEE_OTHER);
        }
        }else 
        return $this->render('main/check-members.html.twig', []);
    }




    /**
     * @Route("/adding-members/{stdID}", name="addMember")
     */
    public function addingMemberAction(String $stdID, MemberRepository $repo, Request $req, SluggerInterface $slugger, AccountRepository $account, ClubsRepository $clubs): Response
    {
        $member = new Member();
        
        //get Student name fron stdID
        $accountObj = $account->findOneBy(['studenId'=>$stdID]);
        $stdName =$accountObj->getStudenName();
        // //get Account ID from stdID
        $accountId = $accountObj->getId();
        // $member->setAccountId($accountObj);
        $form = $this->createForm(MemberType::class, $member);

        $form->handleRequest($req);
        if($form->isSubmitted()&&$form->isValid()){

            
            // $getData = [];
            // $getClubName = $req->query->get("ClubName");
            // $clubObj = $clubs->findClubId($getClubName);
            
            $imgFile = $form->get('file')->getData();
            $accid = $req->request->get("accid");

            $id = $account->find($accid);
            // $getData[] = $accid;

            // $role = $member->getMemberRole();
            // $getData[] = $role;
            
            //Get club id from club name
            $clubname = $member->getClubId();
            $clubObj = $clubs->findOneBy(['id'=>$clubname]);
            // $clubId = $clubObj->getId();
            // $idClub = $clubs->find($clubId);
            

            //set 
            $member->setClubId($clubObj);
            $member->setAccountId($id);

            //Có account id rồi thì sẽ findby để lấy về 1 object account và add nó vào member

            if($imgFile){
                $newFileName = $this->uploadImage($imgFile, $slugger);
                    $member->setImage($newFileName);
            }
            // return $this->json($idClub);
            
            $repo->save($member, true);
            return $this->redirectToRoute('Members', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('main/adding-members.html.twig',['form'=>$form->createView(),
        'studentId'=>$stdID,
        'studentName'=>$stdName, 'accountId'=>$accountId]);
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
