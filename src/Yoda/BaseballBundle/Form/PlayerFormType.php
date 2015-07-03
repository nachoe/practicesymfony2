<?php

namespace Yoda\BaseballBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Yoda\BaseballBundle\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;
use Yoda\BaseballBundle\Form\TeamFormType;
use Yoda\BaseballBundle\Entity\Player;


class PlayerFormType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', 'text', array('label' => 'First Name', 'required'=>false, 'attr' => array('class' => 'form-control')))
            ->add('lastName', 'text', array('label' => 'Lase Name', 'required'=>false, 'attr' => array('class' => 'form-control')))
            ->add('position', 'text', array('label' => 'Position', 'required'=>false, 'attr' => array('class' => 'form-control')))
            ->add('teamName', 'entity', array('class' => 'BaseballBundle:Team', 'label' => 'Team', 'required'=>false, 'attr' => array('class' => 'form-control')))
        ;
    }


    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Yoda\BaseballBundle\Entity\Player'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'yoda_baseballbundle_event';
    }

} 