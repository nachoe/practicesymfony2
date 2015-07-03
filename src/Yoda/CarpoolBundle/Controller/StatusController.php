<?php

namespace Yoda\CarpoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Yoda\CarpoolBundle\Entity\Carpoolers;
use Yoda\CarpoolBundle\Form\CarpoolerFormType;


class StatusController extends Controller
{

    /**
     *
     * @Route("/create_carpooler", name="create_carpooler")
     * @Method({"GET","POST"})
     * @Template
     */
    public function createCarpoolerAction(Request $request)
    {
        $form = $this->createForm(new CarpoolerFormType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $new_pooler=$form->getData();
            $em->persist($new_pooler);
            $em->flush();
            return $this->redirect($this->generateUrl('show_all_poolers'));

        }
        return array(
            'form' => $form->createView(),
        );
    }


    /**
     *
     * @Route("/show_all_poolers", name="show_all_poolers")
     * @Method("GET")
     * @Template
     */
    public function showAllCarpoolersAction()
    {
        $poolers = $this->getDoctrine()->getRepository('Yoda\\CarpoolBundle\\Entity\\Carpoolers')->findAll();

        return array (
            'poolers' => $poolers
        );
    }

    /**
     *
     * @Route("/{id}/edit_carpooler", name="edit_carpooler")
     * @Method({"GET","POST"})
     * @Template
     */
    public function editCarpoolerAction(Request $request, Carpoolers $carpoolers)
    {
        $poolers = $this->getDoctrine()->getRepository('Yoda\\CarpoolBundle\\Entity\\Carpoolers')->findAll();

        $form = $this->createForm(new CarpoolerFormType(),$carpoolers);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $new_pooler=$form->getData();
            $em->persist($new_pooler);
            $em->flush();
            return $this->redirect($this->generateUrl('show_all_poolers'));

        }
        return array(
            'form' => $form->createView(),
            'poolers' => $poolers
        );
    }

    /**
     *
     * @Route("/{id}/delete_carpooler", name="delete_carpooler")
     * @Method("GET")
     */
    public function deleteAction(Carpoolers $poolers)
    {
        $this->getDoctrine()->getEntityManager()->remove($poolers);
        $this->getDoctrine()->getEntityManager()->flush();
        return $this->redirect($this->generateUrl('show_all_poolers'));

    }
}
