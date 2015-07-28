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
     * @Route("/", name="index")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('show_bets'));
    }
}
