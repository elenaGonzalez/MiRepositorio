<?php

namespace Calculadora\catalogoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CaracteristicaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Calculadora\catalogoBundle\Entity\Caracteristica'
        ));
    }

    public function getName()
    {
        return 'calculadora_catalogobundle_caracteristicatype';
    }
}
