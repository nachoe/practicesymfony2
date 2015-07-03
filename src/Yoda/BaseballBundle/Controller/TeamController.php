<?php

namespace Yoda\BaseballBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Yoda\BaseballBundle\Entity\Team;
use Yoda\BaseballBundle\Form\TeamFormType;


class TeamController extends Controller
{
    /**
     *
     * @Route("/create_team", name="create_team")
     * @Method({"GET","POST"})
     * @Template
     */
    public function createTeamAction(Request $request)
    {
        $form = $this->createForm(new TeamFormType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $new_team=$form->getData();
            $em->persist($new_team);
            $em->flush();
            return $this->redirect($this->generateUrl('show_all'));

        }
        return array(
            'form' => $form->createView(),
        );
    }

    /**
     *
     * @Route("/show_all", name="show_all")
     * @Method("GET")
     * @Template
     */
    public function showAllAction()
    {
        $players = $this->getDoctrine()->getRepository('Yoda\\BaseballBundle\\Entity\\Player')->findAll();
        $teams = $this->getDoctrine()->getRepository('Yoda\\BaseballBundle\\Entity\\Team')->findAll();
        return array (
            'players' => $players,
            'teams' => $teams

        );
    }

    /**
     *
     * @Route("/{id}/delete_team", name="delete_team")
     * @Method("GET")
     */
    public function deleteAction(Team $team)
    {
        $this->getDoctrine()->getEntityManager()->remove($team);
        $this->getDoctrine()->getEntityManager()->flush();
        return $this->redirect($this->generateUrl('show_all'));

    }

    /**
     *
     * @Route("/{id}/edit_team", name="edit_team")
     * @Method({"GET","POST"})
     * @Template
     */
    public function editTeamAction(Request $request, Team $team)
    {
        $form = $this->createForm(new TeamFormType(),$team);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $new_team=$form->getData();
            $em->persist($new_team);
            $em->flush();
            return $this->redirect($this->generateUrl('show_all'));

        }
        return array(
            'form' => $form->createView(),
        );
    }
}
