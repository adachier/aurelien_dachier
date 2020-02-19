<?php

namespace App\Form;

use App\Entity\Drone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class DroneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Entrez le nom du drône',
                'attr' => [
                    'placeholder' => "Entrez le nom ici"
                ]
            ])
            ->add('marque', TextType::class, [
                'label' => 'Entrez la marque du drône',
                'attr' => [
                    'placeholder' => "Entrez la marque ici"
                ]
            ])
            ->add('image', TextType::class, [
                'label' => "Entrez l'url de l'image",
                'attr' => [
                    'placeholder' => "Entrez l'url ici"
                ]
            ])
            ->add('prix', NumberType::class, [
                'label' => "Entrez le prix du drône",
                'attr' => [
                    'placeholder' => "Entrez le prix ici"
                ]
            ])
            ->add('autonomie',NumberType::class, [
                'label' => "Entrez l'autonomie du drône",
                'attr' => [
                    'placeholder' => "Entrez l'autonomie ici"
                ]
            ])
            ->add('presentation', TextareaType::class,[
                'label' => "Mais encore ?",
                'attr' => [
                    'placeholder' => "Présentez le produit ici"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Drone::class,
        ]);
    }
}
