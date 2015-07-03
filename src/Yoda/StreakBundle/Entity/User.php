<?php
/**
 * Created by PhpStorm.
 * Angular: Jesse
 * Date: 4/27/2015
 * Time: 9:56 PM
 */

namespace Yoda\StreakBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * A record of an annual pm being performed
 *
 * @ORM\Table(name="test_user")
 * @ORM\Entity
 *
 */

class User extends BaseEntity{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="firstname", type="string")
     * @Assert\NotBlank()
     */
    private $firstname;

    /**
     * @ORM\Column(name="lastname", type="string")
     * @Assert\NotBlank()
     */
    private $lastname;

    /**
     * @ORM\Column(name="entryname", type="string")
     * @Assert\NotBlank()
     */
    private $entryname;

    /**
     * @ORM\Column(name="entryid", type="integer")
     * @Assert\NotBlank()
     */
    private $entryid;

    /**
     * @ORM\Column(name="balance", type="integer")
     * @Assert\NotBlank()
     */
    private $balance;

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return mixed
     */
    public function getEntryid()
    {
        return $this->entryid;
    }

    /**
     * @param mixed $entryid
     */
    public function setEntryid($entryid)
    {
        $this->entryid = $entryid;
    }

    /**
     * @return mixed
     */
    public function getEntryname()
    {
        return $this->entryname;
    }

    /**
     * @param mixed $entryname
     */
    public function setEntryname($entryname)
    {
        $this->entryname = $entryname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

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

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }



} 