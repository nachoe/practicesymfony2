<?php
/**
 * Created by PhpStorm.
 * User: Jesse
 * Date: 5/6/2015
 * Time: 8:24 PM
 */

// src/Acme/UserBundle/Entity/Users.php

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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}