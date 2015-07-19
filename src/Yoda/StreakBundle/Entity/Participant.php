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
use Yoda\StreakBundle\Entity\Bet;


/**
 *
 *
 * @ORM\Table(name="participants")
 * @ORM\Entity
 *
 */

class Participant extends BaseEntity
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
    * @ORM\ManyToOne(targetEntity="Bet", inversedBy="participants")
    * @ORM\JoinColumn(name="bet_id", referencedColumnName="id")
    */
    private $bet;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}