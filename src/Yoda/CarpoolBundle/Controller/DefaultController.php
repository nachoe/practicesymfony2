<?php

namespace Yoda\CarpoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{

    /**
     *
     * @Route("/jesse/{name}", name="jesse")
     */
    public function indexAction($name)
    {
        return $this->render('CarpoolBundle:Default:index.html.twig', array('name' => $name));
    }
}
