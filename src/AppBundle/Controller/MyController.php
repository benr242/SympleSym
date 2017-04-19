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
     * @Route("/user/{user}", name="userVar")
     */
    public function userVarAction($user)
    {
        $person = "thisPerson";


        $notes = [
            'Octopus asked me a riddle, outsmarted me',
            'I counted 8 legs... as they wrapped around me',
            'Inked!'
        ];

        return  $this->render('basic.html.twig', [
            'me' => 'benr242',
            'user' => $user,
            'person' => $person,
            'notes' => $notes
        ]);
    }
}
