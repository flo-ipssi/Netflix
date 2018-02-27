<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('author', TextType::class)
            ->add('email', TextType::class)
            ->add('category', TextType::class)
            ->add('description', TextType::class)
            ->add('duration', NumberType::class)
            ->add('date', TextType::class)
            //->add('brochure', FileType::class, array('label' => 'Brochure Film'))
            ->add('save', SubmitType::class);

    }
}
