<?php

namespace Yoda\CarpoolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Yoda\CarpoolBundle\Entity\Carpoolers;


class CarpoolerFormType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('fname', 'text', array(
//                'label' => 'First Name', 'read_only'=>true, 'required'=>false, 'attr' => array('class' => 'form-control')
//            ))
//            ->add('lname', 'text', array(
//                'label' => 'Lase Name', 'required'=>false, 'attr' => array('class' => 'form-control')
//            ))
            ->add('status', 'choice', array(
                'choices' => array('Carpooling' => 'Carpooling','Not Carpooling' => 'Not Carpooling',
                    'OMW' => 'OMW', 'Arrived' => 'Arrived'),
            ))
            ->add('comments', 'textarea', array(
                'label' => 'Comments', 'required'=>false, 'attr' => array('class' => 'form-control')
            ))
        ;
    }


    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Yoda\CarpoolBundle\Entity\Carpoolers'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'yoda_carpoolbundle_event';
    }

}