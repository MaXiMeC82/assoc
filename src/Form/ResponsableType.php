<?php

namespace App\Form;

use App\Entity\Responsable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ResponsableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('email', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez votre adresse e-mail'],
                'label' => 'Adresse Email'
            ])
            ->add('password', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => '******'],
                'label' => 'Mot de passe'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-primary btn-block mb-4']
            ])
            ->add('nom', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Nom'
            ])
            ->add('prenom', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Prénom'
            ])
            ->add('num_de_telephone')
            ->add('is_archived')
            ->add('is_validated')

            // Utiliser un interrupteur bascule pour le rôle
            ->add('responsabilite', CheckboxType::class, [
                'attr' => ['class' => 'form-check-input'], // Les classes CSS Bootstrap pour l'interrupteur bascule
                'required' => false, // Le champ n'est pas obligatoire
                'label_attr' => ['class' => 'form-check-label'], // Les classes CSS Bootstrap pour l'étiquette de l'interrupteur bascule
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Responsable::class,
            'small_screen' => false, // Par défaut, l'écran n'est pas petit
        ]);
    }
}
