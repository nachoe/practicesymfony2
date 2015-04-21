<?php

namespace Yoda\BaseballBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;




class DefaultController extends Controller
{
    /**
     *
     * @Route("/baseball", name="home")
     * @Method("GET")
     */
    public function indexAction()
    {
        die("hello");
    }
}
