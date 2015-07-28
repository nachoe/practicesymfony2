<?php

namespace Yoda\StreakBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


abstract class ApplicationController extends Controller
{

    protected function getRepository($repoName)
    {
        $entity_path = sprintf('Yoda\\StreakBundle\\Entity\\%s', $repoName);
        return $this->getDoctrine()->getRepository($entity_path);
    }

    protected function getManager()
    {
        return $this->getDoctrine()->getManager();
    }
}