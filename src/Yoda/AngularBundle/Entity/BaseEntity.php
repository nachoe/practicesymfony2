<?php

namespace Yoda\AngularBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Util\ClassUtils;

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Base entity all other entities derive from
 *
 * @ORM\MappedSuperclass
 */
abstract class BaseEntity
{
    /**
     * var \DateTime $created_at
     *
     * Gedmo\Timestampable(on="create")
     * ORM\Column(type="datetime")
     */
    //private $created_at;

    /**
     * var \DateTime $updated_at
     *
     * Gedmo\Timestampable(on="update")
     * ORM\Column(type="datetime")
     */
    //private $updated_at;

    /**
     * Set created at
     *
     * param  \DateTime $createdAt
     * return self
     */
    //public function setCreatedAt(\DateTime $createdAt)
   // {
   //     $this->created_at = $createdAt;

   //     return $this;
   // }

    /**
     * Get created at
     *
     * return \DateTime
     */
   // public function getCreatedAt()
   // {
    //    return $this->created_at;
   // }

    /**
     * Set updated at
     *
     * param  \DateTime $updatedAt
     * return self
     */
   // public function setUpdatedAt(\DateTime $updatedAt)
   // {
   //     $this->updated_at = $updatedAt;

   //     return $this;
   // }

    /**
     * Get updated at
     *
     * return \DateTime
     */
   // public function getUpdatedAt()
   // {
   //     return $this->updated_at;
   // }

    /**
     * Get the correct object class (even if it is a proxy)
     *
     * @return string
     */
    public function getClass()
    {
        return ClassUtils::getClass($this);
    }

    /**
     * Get the particular class name from the fully distinguished name
     *
     * @return string
     */
    public function getClassName()
    {
        $full_class_name = $this->getClass();
        $pos = strrpos($full_class_name, '\\');

        return substr($full_class_name, $pos + 1);
    }
}
