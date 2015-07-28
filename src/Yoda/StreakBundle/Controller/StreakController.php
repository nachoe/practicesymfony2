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
use Yoda\StreakBundle\Entity\Bet;
use Yoda\StreakBundle\Controller\ApplicationController;


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
     * @Route("/show_bets", name="show_bets", options={"expose"=true})
     * @Method({"GET","POST"})
     * @Template()
     */
    public function showAction(Request $request)
    {
        $bets = $this->getRepository('Bet')->findAll();

        return array(
            'bets' => $bets,
        );
    }

    /**
     *
     * @Route("/get_data", name="get_all_bet_data", options={"expose"=true})
     * @Method({"GET"})
     */
    public function getAllBetsDataAction(Request $request)
    {
        $bets = $this->getRepository('Bet')->findAll();

        $serializer = $this->get('jms_serializer');
        $s_bets = $serializer->serialize($bets, 'json');
        //$json_data = json_encode($s_bets, true);


        return new JsonResponse($s_bets);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Route("/update", name="update_bet", options={"expose"=true})
     * @Method({"POST","GET"})
     */
    public function updateBets(Request $request)
    {
        $em = $this->getManager();
        $post_data = json_decode($request->getContent(), true);
        $serializer = $this->get('jms_serializer');

        $test = $serializer->deserialize(json_encode($post_data), 'Yoda\\StreakBundle\\Entity\\Bet', 'json');

        $em->merge($test);

        $em->persist($test);
        $em->flush();

        return new JsonResponse($post_data);
    }
}
