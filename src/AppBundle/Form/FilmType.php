<?php

namespace AppBundle\Form;

use AppBundle\Entity\Films;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('title', TextType::class)
            ->add('author', TextType::class)
            ->add('category', TextType::class)
            ->add('description', TextType::class)
            ->add('duration', NumberType::class)
            ->add('date', NumberType::class)
            ->add('brochure', FileType::class, array('label' => 'Brochure Film'))
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Films::class,
        ));
    }
}