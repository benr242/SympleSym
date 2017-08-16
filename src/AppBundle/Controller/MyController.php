<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Genus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MyController extends Controller
{

    /**
     * @Route("/", name="githut")
     */
    public function githutAction(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.github.com/users/codereviewvideos');
        $data = json_decode($response->getBody()->getContents(), true);

        //dump($response->getBody()->getContents());
        dump($data);
        /*
        $templateData = [
            'avatar_url'  => $data['avatar_url'],
            'name'        => $data['name'],
            'login'       => $data['login'],
            'details'     => [
                'company'   => $data['company'],
                'location'  => $data['location'],
                'joined_on' => 'Joined on ' . (new \DateTime($data['created_at']))->format('d m Y'),
            ],
            'blog'        => $data['blog'],
            'social_data' => [
                "Public Repos" => $data['public_repos'],
                "Followers"    => $data['followers'],
                "Following"    => $data['following'],
            ]
        ];

        */

        $templateData = [
            'avatar_url'  => 'https://avatars.githubusercontent.com/u/12968163?v=3',
            'name'        => 'Code Review Videos',
            'login'       => 'codereviewvideos',
            'details'     => [
                'company'   => 'Code Review Videos',
                'location'  => 'Preston, Lancs, UK',
                'joined_on' => 'Joined on Fake Date For Now',
            ],
            'blog'        => 'https://codereviewvideos.com/',
            'social_data' => [
                'followers'    => 11,
                'following'    => 22,
                'public_repos' => 33,
            ],

            'repo_count' => 100,
            'most_stars' => 50,
            'repos' => [
                [
                    'url' => 'https://codereviewvideos.com',
                    'name' => 'Code Review Videos',
                    'description' => 'some repo description',
                    'stargazers_count' => '999',
                ],
                [
                    'url' => 'http://bbc.co.uk',
                    'name' => 'The BBC',
                    'description' => 'not a real repo',
                    'stargazers_count' => '666',
                ],
                [
                    'url' => 'http://google.co.uk',
                    'name' => 'Google',
                    'description' => 'another fake repo description',
                    'stargazers_count' => '333',
                ],
            ],

        ];

        return $this->render('githut/index.html.twig', $templateData);
    }



    /**
    * @Route("/home", name="home")
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
        $testData = [
            "avatar_url"  =>  "https://avatars.githubusercontent.com/u/12968163?v=3",
            "name"        => "Code Review Videos",
            "login"       => "codereviewvideos",
            "blog"        => "https://codereviewvideos.com/"
        ];

        return $this->render('test/td.html.twig', $testData);
    }
}
