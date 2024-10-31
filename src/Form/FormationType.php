<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'attr' => ['class' => 'form-control', 'autocomplete' => 'off'],
                'label' => "Nom de la formation"
            ])
            ->add('lieu', TextType::class,[
                'attr' => ['class' => 'form-control', 'autocomplete' => 'off'],
                'label' => "Lieu de la formation"
            ])
            ->add('montant', TextType::class,[
                'attr' => ['class' => 'form-control', 'autocomplete' => 'off'],
                'label' => "Montant de participation"
            ])
            ->add('debutAt', null, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control', 'autocomplete' => 'off'],
                'label' => "Date début de la formation"
            ])
            ->add('finAt', null, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control', 'autocomplete' => 'off'],
                'label' => "Date fin de la formation"
            ])
            ->add('dateLineAt', null, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control', 'autocomplete' => 'off'],
                'label' => "Date limite d'inscription"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
