<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SimpleController extends Controller

    public function indexAction($name)
    {
        return $this->render('', array('name' =>
    }

    public function myAction(Request $request)
    {

    }
