<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/admin")
     */
    public function admin(SessionInterface $session, UserInterface $user)
    {
        
        $er=$user->getId();
        var_dump($er);
        die();
        return new Response('<html><body>Admin page!</body></html>');
    }
}