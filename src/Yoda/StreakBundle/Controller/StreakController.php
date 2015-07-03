<?php

namespace Yoda\StreakBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Yoda\StreakBundle\Form\BetFormType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yoda\StreakBundle\Entity\User;

class StreakController extends ApplicationController
{

    /**
     *
     * @Route("/create_bet", name="create_bet")
     * @Method({"GET","POST"})
     * @Template
     */
    public function createBetAction(Request $request)
    {
        $form = $this->createForm(new BetFormType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $new_bet=$form->getData();
            $em->persist($new_bet);
            $em->flush();

            return $this->redirect($this->generateUrl('show_bets'));

        }

        return array(
            'form' => $form->createView(),
        );

    }


    /**
     *
     * @Route("/show_group", name="show_group")
     * @Method("GET")
     * @Template
     */
    public function showGroupAction()
    {

    }

    /**
     *
     * @Route("/show_bets", name="show_bets")
     * @Method({"GET","POST"})
     * @Template
     */
    public function showAction(Request $request)
    {
        $id = $request->query->get('id');
        $bets = $this->getRepository('Bet')->findAll();
        $user = $this->getDoctrine()->getRepository('Yoda\\UserBundle\\Entity\\User')->findOneById($id);

        return array(
          'bets' => $bets,
          'user' => $user,
        );
    }

}
