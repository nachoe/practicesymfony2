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
use Yoda\StreakBundle\Entity\Bet;

class BetFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', 'text', array('label' => 'Description', 'attr' => array('class' => 'form-control')))
            ->add('amount', 'integer', array('label' => 'Bet Amount', 'attr' => array('class' => '')))
            ->add('start_date', 'date', array('label' => 'Start Date', 'attr' => array('class' => '')))
            ->add('end_date', 'date', array(
                'label' => 'End Date',
                'attr' => array('class' => '')))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Yoda\StreakBundle\Entity\Bet'
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
