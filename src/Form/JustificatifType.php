<?php

namespace App\Form;

use App\Entity\Campeur;
use App\Entity\Section;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class JustificatifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sacrement', FileType::class,[
                'attr'=>['class'=>"form-control form-control-lg"],
                'label' => "Joindre votre carnet de baptême ( la partie relative aux sacréments)",
                'mapped' => false,
                'multiple' => false,
                'constraints' => [
                    new File([
                        'maxSize' => "20000k",
                        'mimeTypes' =>[
                            'image/png',
                            'image/jpeg',
                            'image/jpg',
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => "Votre fichier doit être de type image (png, jpg) ou pdf",
                        'maxSizeMessage' => "La taille de votre fichier doit être inférieure à 2Mo",
                    ])
                ],
                'required' => true
            ])
            ->add('dernierCulte', FileType::class,[
                'attr'=>['class'=>"form-control form-control-lg"],
                'label' => "Joindre votre carnet de baptême ( la partie relative au dernier de culte)",
                'mapped' => false,
                'multiple' => false,
                'constraints' => [
                    new File([
                        'maxSize' => "20000k",
                        'mimeTypes' =>[
                            'image/png',
                            'image/jpeg',
                            'image/jpg',
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => "Votre fichier doit être de type image (png, jpg) ou pdf",
                        'maxSizeMessage' => "La taille de votre fichier doit être inférieure à 2Mo",
                    ])
                ],
                'required' => true
            ])
            ->add('attestation', FileType::class,[
                'attr'=>['class'=>"form-control form-control-lg"],
                'label' => "Joindre l’attestation de votre dernier camp de formation",
                'mapped' => false,
                'multiple' => false,
                'constraints' => [
                    new File([
                        'maxSize' => "20000k",
                        'mimeTypes' =>[
                            'image/png',
                            'image/jpeg',
                            'image/jpg',
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => "Votre fichier doit être de type image (png, jpg) ou pdf",
                        'maxSizeMessage' => "La taille de votre fichier doit être inférieure à 2Mo",
                    ])
                ],
                'required' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Campeur::class,
        ]);
    }
}
