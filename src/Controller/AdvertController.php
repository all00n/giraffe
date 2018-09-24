<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Adverts;

class AdvertController extends Controller
{
    public function index($slug){
        
        $advRepo = $this->getDoctrine()->getRepository(Adverts::class);
        $pager = $slug ? $slug : 1;
        $limit = 5;
        $adverts = $advRepo->findAdverts($pager,$limit);

        $pager = [
            'pager' => $pager,
            'total' => $advRepo->countAdvert(),
            'limit' => 5,
        ];
        return $this->render('main/home.html.twig',[
            'adverts' => $adverts,
            'navigator' => $pager,
                ]);
    }
    
    public function advertList($slug,UserInterface $user){
        
        $userId = $user->getId();
        
        $advRepo = $this->getDoctrine()->getRepository(Adverts::class);
        $pager = $slug ? $slug : 1;
        $limit = 5;
        $adverts = $advRepo->getList($pager,$limit,$userId);
        $pager = [
            'pager' => $pager,
            'total' => $advRepo->countAdvertList($userId),
            'limit' => 5,
        ];
        return $this->render('adverts/advert.html.twig',[
            'adverts' => $adverts,
            'navigator' => $pager
                ]);
    }
    
    public function edit(Request $request,UserInterface $user, $slug)
    {
        $errors = [];
        $em = $this->getDoctrine()->getManager();
        $advert = $em->find(Adverts::class, $slug);

        if($user->getId() != $advert->getAuthor_id()){
            return $this->redirectToRoute('home');
        }
        if($request->getMethod() === 'POST'){
            
            $data = $request->request->all();
           
            $errors = $this->Validate($data);
            
            if(!$errors){
            $advert->setTitle($data['title']);
            $advert->setDescription($data['description']);
            
            $em->persist($advert);
            $em->flush();
            
            return $this->redirectToRoute('home');
            }

        }
        
        return $this->render('adverts/edit.html.twig', [
            'errors' => $errors,
            'advert' => $advert,
                ]);
    }
    
    public function add(Request $request,UserInterface $user)
    {
        
        $errors = [];
        $advert = [
            'title' => '',
            'description' => ''
            ];
        
        if($request->getMethod() === 'POST'){
            
            $advert = $request->request->all();
            
            $errors = $this->Validate($advert);
            
            if(!$errors){
                $em = $this->getDoctrine()->getManager();

                $em->getRepository(Adverts::class)->addAdvert($advert,$user->getId());

                return $this->redirectToRoute('advert.list');
            }
        }
        
        return $this->render('adverts/add.html.twig', [
            'errors' => $errors,
            'advert' => $advert
                ]);
    }
    
    public function remove($slug,UserInterface $user)
    {
        
        $em = $this->getDoctrine()->getManager();
        $Advert =$em->find(Adverts::class, $slug);
        
        if($user->getId() != $Advert->getAuthor_id()){
            return $this->redirectToRoute('home');
        }
        
        $em->remove($Advert);
        $em->flush();
        return $this->redirectToRoute('home');
    }
    
    private function Validate($date){
        
        $errors = [];
        
        if(empty($date['title']) || !preg_match('/^[0-9a-zA-Zа-яА-Я\-\s]{5,255}$/u', $date['title'])){
            $errors['title'] = true;
        }
        
        if(empty($date['description'])){
            $errors['description'] = true;
        }
        
        if($date){
             return $errors;
        }
        
        return FALSE;
    }
}