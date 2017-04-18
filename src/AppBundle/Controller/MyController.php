<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MyController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    public function myAction()
    {
        return  $this->render('basic.html.twig', [
            'me' => 'benr242'
        ]);
    }

    /**
     * @Route("/user/{user}")
     */
    public function userVarAction($user)
    {

        return  $this->render('basic.html.twig', [
            'me' => 'benr242',
            'user' => $user
        ]);
    }
}
