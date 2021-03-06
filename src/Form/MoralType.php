<?php

namespace App\Form;

use App\Entity\Moral;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MoralType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'nomEmpl',
                TextType::class,
                [
                    "attr" => ["class" => "form-control"]
                ]
            )
            ->add(
                'ninea',
                TextType::class,
                [
                    "attr" => ["class" => "form-control"], "required" => false
                ]
            )
            ->add('rc', null, [
                "attr" => ["class" => "form-control"],
                "required" => false
            ])
            ->add(
                'raisonSocial',
                null,
                [
                    "attr" => [
                        "class" => "form-control",
                        'minlength' => 2, 'maxlength' => 20
                    ]
                ]
            )
            ->add(
                'adressEmpl',
                TextType::class,
                [
                    "attr" => [
                        "class" => "form-control"
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Moral::class,
        ]);
    }
}
