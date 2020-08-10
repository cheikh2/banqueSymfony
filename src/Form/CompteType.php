<?php

namespace App\Form;

use App\Entity\Compte;
use App\Entity\Moral;
use App\Entity\Physique;
use App\Entity\TypeCompte;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numAgence')
            ->add('numCompte')
            ->add('rib')
            ->add('montant')
            ->add('dateDebut', DateType::class,['widget'=>'single_text'])
            ->add('dateFin', DateType::class,['widget'=>'single_text'])
            ->add('moral',
            EntityType::class,
            [
                'class' => Moral::class,
                'choice_label' => 'nomEmpl'
            ]
            )
            ->add('physique',
            EntityType::class,
            [
                'class' => Physique::class,
                'choice_label' => 'prenom'
            ]
            )
            ->add('typecomptes',
            EntityType::class,
            [
                'class' => TypeCompte::class,
                'choice_label' => 'libelle'
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
