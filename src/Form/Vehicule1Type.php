<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class Vehicule1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque', TextType::class,[
                'required'=> true])
            ->add('model', TextType::class,[
                'required'=> true])
            ->add('kilometrage', IntegerType::class,[
                'required'=> true])
            ->add('options', TextareaType::class,[
                'required'=> false])
            ->add('revision', TextareaType::class,[
                'required'=> false])
            ->add('annonce', TextType::class,[
                'required'=> false])  
            ->add('numero', TextType::class,[
                'required'=> false])
            ->add('imatriculation', TextType::class,[
                'required'=> false])
            ->add('nouvelleimat', TextType::class,[
                'required'=> false])
            ->add('prixachat', IntegerType::class,[
                    'required'=> false])     
            ->add('prixvente', IntegerType::class,[
                'required'=> false])
            ->add('garantie', TextareaType::class,[
                'required'=> false])
            ->add('miseencirculation', DateType::class,[ 'required' => true,'years' =>range(2025, 1980), 'format' => 'dd MM yyyy'])
            ->add('porte', ChoiceType::class, ['required'=> false,
                'choices'  => [
                    '3' => '3',
                    '5' => '5'
                ]])
            ->add('puissance', IntegerType::class,[
                'required'=> false])
        
            ->add('carburant', ChoiceType::class, ['required'=> false,
                'choices'  => [
                    'gazole' => 'gazole',
                    'essence' => 'essence',
                    'hybride' => 'hybride',
                    'electrique' => 'electrique'
                ]])
            ->add('boite', ChoiceType::class, ['required'=> false,
                'choices'  => [
                    'manuelle' => 'manuelle',
                    'auto' => 'auto'
                ]])
            ->add('imageFile',FileType::class,[
                'required'=> false, 
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
