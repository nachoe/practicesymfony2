<?php

namespace Yoda\AngularBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\SerializerBundle\Annotation\ExclusionPolicy;
use JMS\SerializerBundle\Annotation\Exclude;
use Symfony\Component\HttpFoundation\Response;
use Yoda\AngularBundle\Entity\Player;
use Yoda\BaseballBundle\Controller\ApplicationController;
use Yoda\AngularBundle\Entity\Angplayer;



class AngularController extends ApplicationController
{

    /**
     *
     * @Route("/create_angplayer", name="create_angplayer")
     * @Method({"GET","POST"})
     * @Template
     */
    public function createAngplayerAction(Request $request)
    {

    }

    /**
     *
     * @Route("/delete_angplayer", name="delete_angplayer")
     * @Method({"GET","POST"})
     * @Template
     */
    public function deleteAngplayerAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $new_player = new Player();
        
    }


    /**
     *
     * @Route("/process_angplayer", name="process_angplayer")
     * @Method({"GET","POST"})
     */
    public function processAngplayerAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
//        var_dump($data); die();
        $new_player = new Player();
        $new_player->setFirstName($data['fname']);
        $new_player->setLastName($data['lname']);
        $new_player->setPosition($data['position']);

        $em = $this->getEntityManager();

        $em->persist($new_player);
        $em->flush();
        return $this->redirect($this->generateUrl('show_angplayer'));

    }
    /**
     *
     * @Route("/show_angplayer", name="show_angplayer")
     * @Method({"GET","POST"})
     * @Template
     */
    public function showAngplayerAction(Request $request)
    {


    }



    /**
     *
     * @Route("/ang_api", name="ang_api")
     * @Method({"GET"})
     */
    public function angApiAction(Request $request)
    {

        $players = $this->getDoctrine()->getRepository('Yoda\\AngularBundle\\Entity\\Player')->findAll();
        $json_players = array();

        foreach($players as $idx => $player){

            $json_array=array(
                'fName' => $player->getFirstName(),
                'lName' => $player->getLastName(),
                'position' => $player->getPosition(),
                'id' => $player->getId()
            );

            $json_players[] = $json_array;
        }

        $serializer = $this->container->get('serializer');


        $reports = $serializer->serialize($json_players, 'json');
        return new Response($reports);

    }

}
