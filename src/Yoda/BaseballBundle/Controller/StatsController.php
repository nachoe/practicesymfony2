<?php
/**
 * Created by PhpStorm.
 * Angular: Jesse
 * Date: 4/24/2015
 * Time: 4:35 PM
 */

namespace Yoda\BaseballBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class StatsController extends Controller {

    /**
     *
     * @Route("/statsview", name="statsview")
   //  * @Method({"GET","POST"})
     * @Template
     */
    public function getStatsAction(Request $request)
    {
        $html = file_get_contents('http://streak.espn.go.com/en/entryStats?entryID=6820526');

        $c = curl_init('http://streak.espn.go.com/en/entryStats?entryID=6820526');
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
//curl_setopt(... other options you want...)

        $html = curl_exec($c);

        var_dump($html);
        die();
        if (curl_error($c))
            die(curl_error($c));

// Get the status code
        $status = curl_getinfo($c, CURLINFO_HTTP_CODE);

        curl_close($c);
    }

} 