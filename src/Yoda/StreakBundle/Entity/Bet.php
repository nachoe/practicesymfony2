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
use Doctrine\Common\Collections\ArrayCollections;
use Yoda\StreakBundle\Entity\Participant;
use Yoda\UserBundle\Entity\User;


/**
 *
 *
 * @ORM\Table(name="bets")
 * @ORM\Entity
 *
 */
class Bet extends BaseEntity
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
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Participant", mappedBy="id")
     */
    private $participant;

    /**
     * @var integer $amount
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var \Datetime $start_date
     * ORM\Column(name="start_date", type="datetime")
     */
    private $start_date;

    /**
     * @var \Datetime $end_date
     * ORM\Column(name="end_date", type="datetime")
     */
    private $end_date;

    /**
     * @ORM\OneToMany(targetEntity="Yoda\UserBundle\Entity\User", mappedBy="id")
     */
    private $user_id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param User $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }



    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \Datetime
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param \Datetime $end_date
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    /**
     * @return Participant
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * @param Participant $participant
     */
    public function setParticipant($participant)
    {
        $this->participant = $participant;
    }

    /**
     * @return \Datetime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param \Datetime $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }


} 