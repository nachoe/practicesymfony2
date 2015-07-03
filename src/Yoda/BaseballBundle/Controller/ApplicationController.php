<?php

namespace Yoda\BaseballBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


abstract class ApplicationController extends Controller
{

    protected function getRepository($repoName)
    {
        $entity_path = sprintf('Yoda\\BaseballBundle\\Entity\\%s', $repoName);
        return $this->getDoctrine()->getRepository($entity_path);

    }

    protected function getEntityManager()
    {
        return $this->getDoctrine()->getEntityManager();
    }


} 