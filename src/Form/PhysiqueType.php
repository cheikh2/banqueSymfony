<?php

namespace App\Form;

use App\Entity\Moral;
use App\Entity\Physique;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhysiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'prenom',
                TextType::class,
                [
                    "attr" => ["class" => "form-control"]
                ]
            )
            ->add(
                'nom',
                TextType::class,
                [
                    "attr" => ["class" => "form-control"]
                ]
            )
            ->add(
                'adress',
                TextType::class,
                [
                    "attr" => ["class" => "form-control"]
                ]
            )
            ->add(
                'email',
                TextType::class,
                [
                    "attr" => ["class" => "form-control"]
                ]
            )
            ->add(
                'telephone',
                TextType::class,
                [
                    "attr" => ["class" => "form-control"]
                ]
            )
            ->add(
                'sexe',
                TextType::class,
                [
                    "attr" => ["class" => "form-control"]
                ]
            )
            ->add(
                'profession',
                TextType::class,
                [
                    "attr" => ["class" => "form-control"]
                ]
            )
            ->add(
                'cni',
                TextType::class,
                [
                    "attr" => ["class" => "form-control"]
                ]
            )
            ->add(
                'salaire',
                TextType::class,
                [
                    "attr" => ["class" => "form-control"]
                ]
            )
            ->add(
                'moral',
                EntityType::class,
                [
                    'class' => Moral::class,
                    'choice_label' => 'nomEmpl'
                ]
                );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Physique::class,
        ]);
    }
}
