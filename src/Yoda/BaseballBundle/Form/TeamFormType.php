<?php

namespace Yoda\BaseballBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TeamFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Team Name', 'required'=>false, 'attr' => array('class' => 'form-control')))
            ->add('city', 'text', array('label' => 'City', 'required'=>false, 'attr' => array('class' => 'form-control')))
            ->add('team_type', 'text', array('label' => 'Sport Type', 'required'=>false, 'attr' => array('class' => 'form-control')))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Yoda\BaseballBundle\Entity\Team'
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
