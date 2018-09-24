<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;

class HeaderController extends Controller
{
    public function index($title,UserInterface $user = null)
    {
       $userName = null !== $user ? $user->getUsername() : null;
       return $this->render('main/header.html.twig',['title' => $title,'user'=>$userName]);
    }
}