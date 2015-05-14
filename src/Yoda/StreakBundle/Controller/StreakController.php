<?php

namespace Yoda\StreakBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Yoda\StreakBundle\Form\UserFormType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yoda\StreakBundle\Entity\User;

class StreakController extends Controller
{

    /**
     *
     * @Route("/create_streakuser", name="create_streakuser")
     * @Method({"GET","POST"})
     * @Template
     */
    public function createStreakUserAction(Request $request)
    {
        $form = $this->createForm(new UserFormType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $new_streakuser=$form->getData();
            $em->persist($new_streakuser);
            $em->flush();
            return $this->redirect($this->generateUrl('show_group'));

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
        $streaks = $this->getDoctrine()->getRepository('Yoda\\StreakBundle\\Entity\\User')->findAll();

        return array (
            'streaks' => $streaks
        );
    }

    /**
     *
     * @Route("/streak_login", name="streak_login")
     * @Method({"GET","POST"})
     * @Template
     */
    public function loginAction(Request $request)
    {

    }

    /**
     *
     * @Route("/check_login", name="check_login")
     * @Method({"GET","POST"})
     * @Template
     */
    public function checkLoginAction(Request $request)
    {
        $data = $request->request->all();

        $wrong = "wrong login";
        $jsonwrong = array ("Wrong" => $wrong);

        $username = $data['_username'];
        $pwd = $data['_password'];

        if ($username !== 'jesse'){

        } else {
            return $this->redirect($this->generateUrl('show_group'));
        }

    }

}
