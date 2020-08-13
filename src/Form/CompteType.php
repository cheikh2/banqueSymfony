<?php

namespace App\Form;

use App\Entity\Compte;
use App\Entity\Moral;
use App\Entity\Physique;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numAgence',
            TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ]
        )
            ->add('numCompte',
            TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ]
        )
            ->add('rib',
            TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ]
        )
            ->add('montant',
            TextType::class,
            [
                "attr" => ["class" => "form-control"]
            ]
        )
            ->add('dateDebut',
            DateType::class,
            [
                "attr" => ["class" => "form-control"]
            ]
        )
            ->add('dateFin', DateType::class,
            [
                "attr" => ["class" => "form-control"]
            ]
        )
            ->add(
                'moral',
                EntityType::class,[
                    'class'=>Moral::class,
                    'choice_label'=>'nomEmpl'
                ])
            ->add(
                'physique',
                EntityType::class,
                [
                    'class' => Physique::class,
                    'choice_label' => 'prenom',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
    }
}
