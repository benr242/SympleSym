<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Genus;
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

    /**
     * @Route("genus/new")
     */
    public function newAction()
    {
        $genus = new Genus();
        $genus->setName('Octopus'.rand(1, 100));


        $em = $this->getDoctrine()->getManager();
        $em->persist($genus);
        $em->flush();

        return new Response('<html><body>Genus created!</body></html>');
    }
}
