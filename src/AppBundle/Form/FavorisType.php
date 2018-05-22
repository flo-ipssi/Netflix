<?php
/**
 * Created by PhpStorm.
 * User: femmanuel
 * Date: 30/04/2018
 * Time: 16:55
 */

namespace AppBundle\Form;

use AppBundle\Entity\Films;
use AppBundle\Entity\Category;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FavorisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idUser', IntegerType::class)
            ->add('idWork', IntegerType::class)
            ->add('type', TextType::class)
            ->add('save', SubmitType::class);
    }

}