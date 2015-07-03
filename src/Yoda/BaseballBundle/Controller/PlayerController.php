<?php

namespace Yoda\BaseballBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yoda\BaseballBundle\Entity\Player;
use Yoda\BaseballBundle\Entity\Team;
use Yoda\BaseballBundle\Form\PlayerFormType;


class PlayerController extends ApplicationController
{
    /**
     *
     * @Route("/create_player", name="create_player")
     * @Method({"GET","POST"})
     * @Template
     */
    public function createPlayerAction(Request $request)
    {
        $form = $this->createForm(new PlayerFormType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $new_player=$form->getData();
            $em->persist($new_player);
            $em->flush();

            return $this->redirect($this->generateUrl('show_all_players'));

        }


        return array(
            'form' => $form->createView(),
        );
    }

    /**
     *
     * @Route("/show_all_players", name="show_all_players")
     * @Method("GET")
     * @Template
     */
    public function showAllPlayersAction()
    {


//        $teams = $this->getDoctrine()->getRepository('Yoda\\BaseballBundle\\Entity\\Team')->findAll();
        $teams = $this->getRepository('Team')->findAll();
        $players = $this->getDoctrine()->getRepository('Yoda\\BaseballBundle\\Entity\\Player')->findAll();

        return array (
            'teams' => $teams,
            'players' => $players,
        );
    }

    /**
     *
     * @Route("/{id}/delete_player", name="delete_player")
     * @Method("GET")
     */
    public function deleteAction(Player $player)
    {
        $this->getDoctrine()->getEntityManager()->remove($player);
        $this->getDoctrine()->getEntityManager()->flush();
        return $this->redirect($this->generateUrl('show_all_players'));

    }

    /**
     *
     * @Route("/{id}/edit_player", name="edit_player")
     * @Method({"GET","POST"})
     * @Template
     */
    public function editPlayerAction(Request $request, Player $player)
    {
        $form = $this->createForm(new PlayerFormType(),$player);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $new_player=$form->getData();
            $em->persist($new_player);
            $em->flush();
            return $this->redirect($this->generateUrl('show_all_players'));

        }
        return array(
            'form' => $form->createView(),
        );
    }


    /**
     *
     * @Route("/{id}/add_player", name="add_player")
     * @Method({"GET","POST"})
     */
    public function addToTeamAction()
    {
        $team = $this->getRepository('Team')->findOneById(16); //angels
        $player = new Team();
        $player->setPlayers(array($team));
        $em = $this->getDoctrine()->getManager();
        $em->persist($player);
        $em->flush();

        return $this->redirect($this->generateUrl('show_all_players'));
    }

    /**
 *
 * @Route("/{id}/edit2", name="edit2")
 * @Method({"GET"})
 * @Template
 */
    public function edit2Action(Request $request, Player $player)
    {
        return array(
            'player' => $player
        );
    }


    /**
     *
     * @Route("/{id}/get_player_lastname", name="get_player_lastname")
     * @Method({"GET"})
     */
    public function getPlayerLastAction(Request $request, Player $player)
    {
        $player_last_name = array('last_name' => $player->getLastName());
        return new JsonResponse($player_last_name);
    }

    /**
     *
     * @Route("/get_player_lastname_v2", name="get_player_lastname_v2")
     * @Method({"GET"})
     */
    public function getPlayerLastActionV2(Request $request)
    {
        $player_id = $request->get('player_id');
        $player = $this->getRepository('Player')->findOneById(array('id'=>$player_id));
        $player_last_name = array('last_name' => $player->getLastName());
        return new JsonResponse($player_last_name);
    }

    /**
     *
     * @Route("/async_player_edit", name="async_player_edit")
     * @Method({"POST"})
     */
    public function asyncEditAction(Request $request)
    {
        $data = $request->request->all();

        $em = $this->getEntityManager();

        $fname = $data['fname'];
        $lname = $data['lname'];
        $id = $data['id'];

        $player = $this->getRepository('Player')->findOneById(
            array('id'=>$id)
        );

        $player->setFirstName($fname);
        $player->setLastName($lname);

        $em->persist($player);
        $em->flush();

        $jsonPlayer = array(
            'fName' => $player->getFirstName(),
            'lName' => $player->getLastName()
        );

        return new JsonResponse($jsonPlayer);
    }


    /**
     *
     * @Route("/async_api", name="async_api")
     * @Method({"GET"})
     */
    public function asyncApiAction(Request $request)
    {

        $players = $this->getDoctrine()->getRepository('Yoda\\BaseballBundle\\Entity\\Player')->findAll();
        $json_players = array();

        foreach($players as $idx => $player){

            $json_array=array(
                'fName' => $player->getFirstName(),
                'lName' => $player->getLastName(),
                'position' => $player->getPosition()
            );


        }

        return new JsonResponse($json_players);


//       $player = $this->getRepository('Player')->findOneById(
//           array('id'=>4)
//       );
//        $jsonPlayer = array(
//            'fName' => $player->getFirstName(),
//            'lName' => $player->getLastName(),
//            'Position' => $player->getPosition()
//
//        );


    }

} 