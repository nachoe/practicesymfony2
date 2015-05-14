<?php
/**
 * Created by PhpStorm.
 * User: Jesse
 * Date: 5/6/2015
 * Time: 8:24 PM
 */

// src/Acme/UserBundle/Entity/User.php

namespace Yoda\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sfc_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}