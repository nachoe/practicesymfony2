<?php
/**
 * Created by PhpStorm.
 * User: Jesse
 * Date: 4/15/2015
 * Time: 10:52 PM
 */
namespace Yoda\CarpoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * A record of an annual pm being performed
 *
 * @ORM\Table(name="carpoolers")
 * @ORM\Entity
 *
 */
class Carpoolers extends BaseEntity
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="fname", type="string")
     * @Assert\NotBlank()
     */
    private $fname;

    /**
     * @ORM\Column(name="lname", type="string")
     * @Assert\NotBlank()
     */
    private $lname;

    /**
     * @ORM\Column(name="status", type="string")
     * @Assert\NotBlank()
     */
    private $status;


    /**
     * @ORM\Column(name="comments", type="string")
     */
    private $comments;

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }


    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
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
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function __toString()
    {
        return $this->status;
    }

} 