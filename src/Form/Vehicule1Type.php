<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class Vehicule1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque')
            ->add('model')
            ->add('kilometrage')
            ->add('annee')
            ->add('imatriculation')
            ->add('miseencirculation', DateType::class,[ 'required' => true,'years' =>range(2025, 1980), 'format' => 'dd MM yyyy'])
            ->add('porte', ChoiceType::class, [
                'choices'  => [
                    '3' => '3',
                    '5' => '5'
                ]])
            ->add('puissance')
            ->add('note', TextareaType::class)
            ->add('carburant')
            ->add('boite')
            ->add('imageFile',FileType::class,[
                'required'=> false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
