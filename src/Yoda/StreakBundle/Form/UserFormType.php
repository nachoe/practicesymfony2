<?php

namespace Yoda\StreakBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UserFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', 'text', array('label' => 'First Name', 'required'=>false, 'attr' => array('class' => 'form-control')))
            ->add('lastname', 'text', array('label' => 'Last Name', 'required'=>false, 'attr' => array('class' => 'form-control')))
            ->add('entryname', 'text', array('label' => 'Entry Name', 'required'=>false, 'attr' => array('class' => 'form-control')))
            ->add('entryid', 'integer', array('label' => 'Entry ID', 'required'=>false, 'attr' => array('class' => 'form-control')))
            ->add('balance', 'integer', array('label' => 'Balance', 'required'=>false, 'attr' => array('class' => 'form-control')))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Yoda\StreakBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'yoda_streakbundle_event';
    }
}
