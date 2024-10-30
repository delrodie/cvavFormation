<?php

namespace App\Form;

use App\Entity\Campeur;
use App\Entity\Section;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            ->add('matricule')
            ->add('nom', TextType::class,[
                'attr' => ['class' => 'form-control form-control-lg', 'autocomplete' => "off", 'placeholder' => "Nom de famille"]
            ])
            ->add('prenoms', TextType::class,[
                'attr' => ['class' => 'form-control form-control-lg', 'autocomplete' => "off", 'placeholder' => "Prenoms"]
            ])
            ->add('sexe', ChoiceType::class,[
                'attr' => ['class' => 'form-select form-control-lg'],
                'choices' => [
                    '--slectionnez --' => '',
                    'Homme' => 'HOMME',
                    'Femme' => 'FEMME'
                ]
            ])
            ->add('dateNaissance', DateType::class,[
                'attr' => ['class' => 'form-control form-control-lg'],
                'label' => "Date de naissance"
            ])
            ->add('lieuNaissance', TextType::class,[
                'attr' => ['class' => 'form-control form-control-lg', 'placeholder' => "Lieu de naissance", 'autocomplete' => "off"],
                'label' => "Lieu de naissance"
            ])
            ->add('telephone', TelType::class,[
                'attr' => ['class' => 'form-control form-control-lg', 'autocomplete' => "off", 'maxLength' =>10, 'pattern' => "^[0-9]{10}"],
                'label' => "Numero de telephone"
            ])
            ->add('bapteme', ChoiceType::class,[
                'attr' => ['class' => 'form-select form-control-lg'],
                'choices' => [
                    '' => '',
                    'OUI' => true,
                    'NON' => false
                ],
                'required' => true
            ])
            ->add('confirmation', ChoiceType::class, [
                'attr' => ['class' => 'form-select form-control-lg'],
                'choices' => [
                    'NON' => false,
                    'OUI' => true
                ],
                'required' => false,
                'disabled' => true
            ])
            ->add('niveau', ChoiceType::class,[
                'attr' => ['class' => 'form-select form-control-lg'],
                'choices' => [
                    '-- Selectionnez --' => '',
                    'Niveau 2/ 1ère année' => 'Niveau 2/ 1ère année',
                    'Niveau 2/ 2ème année' => 'Niveau 2/ 2ème année',
                    'Niveau 2/ 3ème année' => 'Niveau 2/ 3ème année',
                    'Niveau Supérieur/ 1ère année' => 'Niveau Supérieur/ 1ère année',
                    'Niveau Supérieur/ 2ème année' => 'Niveau Supérieur/ 2ème année',
                    'Niveau Supérieur/ 3ème année' => 'Niveau Supérieur/ 3ème année'
                ],
                'label' => "Niveau de formation à suivre durant le camp"
            ])
            ->add('evaluation', ChoiceType::class,[
                'attr' => ['class' => 'form-select form-control-lg'],
                'choices' => [
                    '' => '',
                    'Écrite' => "ECRITE",
                    'Orale' => 'ORALE'
                ]
            ])
            ->add('medical', ChoiceType::class,[
                'attr' => ['class' => 'form-select form-control-lg'],
                'choices' => [
                    '' => '',
                    'OUI' => true,
                    'NON' => false
                ]
            ])
            ->add('traitement', TextareaType::class,[
                'attr' => ['class' => 'form-control form-control-lg', ],
                'required' => false,
                'disabled' => true,
                'label' => "Préciser le type de traitement et la pathologie"
            ])
            ->add('urgence', ChoiceType::class,[
                'attr' => ['class' => 'form-select form-control-lg'],
                'choices' => [
                    '' => '',
                    'Mère' => 'MERE',
                    'Père' => 'PERE',
                    'Tuteur/tutrice' => 'TUTEUR/TUTRICE',
                    'Conjoint(e)' => 'CONJOINT(E)'
                ],
                'label' => "En cas d'urgence"
            ])
            ->add('contactUrgence', TelType::class,[
                'attr' => ['class' => 'form-control form-control-lg', 'autocomplete' => "off"],
                'label' => "Contact en cas d'urgence"
            ])
//            ->add('attestation')
//            ->add('slug')
//            ->add('section', EntityType::class, [
//                'class' => Section::class,
//                'choice_label' => 'id',
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Campeur::class,
        ]);
    }
}
