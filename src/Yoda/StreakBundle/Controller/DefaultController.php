<?php

namespace Yoda\StreakBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;




class DefaultController extends Controller
{
    /**
     *
     * @Route("/streak", name="home")
     * @Method("GET")
     */
    public function indexAction()
    {
        die("hello");
    }
}
