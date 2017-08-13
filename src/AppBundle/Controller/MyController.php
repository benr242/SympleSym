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
            'user' => 'benr242',
            'me' => 'ben',
            'person' => 'per',
            'notes' => 0
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
        $em = $this->getDoctrine()->getManager();

        $genus = new Genus();
        $genus->setName('OctopusBEN'.rand(1, 100));

        $em->persist($genus);
        $em->flush();

        return new Response('<html><body>Genus created!</body></html>');
    }

    /**
     * @Route("/genus", name="list")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();


        $genuses = $em->getRepository('AppBundle:Genus')
            ->findAll();

        //dump($genuses);die;

        return $this->render('genus/list.html.twig', [
            'genuses' => $genuses
        ]);

    }

    /**
     * @Route("testcss/{test}")
     */
    public function cssTest($test)
    {
        return $this->render('test/mycss.html.twig', [
            'test' => $test
        ]);
    }

    /**
     * @Route("/testData", name="testData")
     */
    public function testDataAction()
    {
        return $this->render('test/td.html.twig', [
            'avatar_url'  => 'https://avatars.githubusercontent.com/u/12968163?v=3',
            'name'        => 'Code Review Videos',
            'login'       => 'codereviewvideos',
            'blog'        => 'https://codereviewvideos.com/'
        ]);
    }
}
