<?php

namespace App\Form;

use App\Entity\Responsable;
use App\Entity\Role;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class ResponsableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('email', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez votre adresse e-mail'],
                'label' => 'Adresse Email',
                'required' => true, // Rendre ce champ requis
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => '******'],
                'label' => 'Mot de passe *',
                'required' => true, // Rendre ce champ requis
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-primary btn-block mb-4 mt-4']
            ])
            ->add('connexion', SubmitType::class, [
                'label' => 'Connexion',
                'attr' => ['class' => 'btn btn-primary btn-block mb-4 mt-4']
            ])
            ->add('nom', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Nom',
                'required' => true, // Rendre ce champ requis
            ])
            ->add('prenom', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Prénom',
                'required' => true, // Rendre ce champ requis
            ])
            ->add('num_de_telephone')
            ->add('is_archived')
            ->add('is_validated')
            ->add('responsabilite', EntityType::class, [
                'required' => false,
                'class' => Role::class,
                'attr' => [
                    'class' => 'select2'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Responsable::class,
            'include_responsabilite' => true, // Par défaut, inclure le champ 'responsabilite'
        ]);

        // Ajoutez une contrainte sur l'option 'include_responsabilite' pour qu'elle soit un booléen
        $resolver->setAllowedTypes('include_responsabilite', 'bool');
    }
}
