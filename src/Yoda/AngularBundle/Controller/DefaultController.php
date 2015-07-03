<?php

namespace Yoda\AngularBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;




class DefaultController extends Controller
{
    /**
     *
     * @Route("/angshow", name="home")
     * @Method("GET")
     * @Template
     */
    public function angAction(Request $request)
    {

    }
}
