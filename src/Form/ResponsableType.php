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
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class ResponsableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('email', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez votre adresse e-mail'],
                'label' => 'Adresse Email',
                'required' => true, // Rendre ce champ requis
                'constraints' => [
                    new Email(['message' => 'L\'email "{{ value }}" n\'est pas valide.']),
                ],
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => '******', 'id' => 'inputPassword2'],
                'label' => 'Mot de passe *',
                'required' => true, // Rendre ce champ requis
                'constraints' => [
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Le mot de passe doit contenir au moins {{ limit }} caractères.',
                    ]),
                    new Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                        'message' => 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, et un caractère spécial.'
                    ]),
                ],
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
                'required' => true,
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-z]+$/',
                        'message' => 'Le nom doit contenir uniquement des lettres.',
                    ]),
                ],
            ])
            ->add('prenom', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Prénom',
                'required' => true,
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-z]+$/',
                        'message' => 'Le prénom doit contenir uniquement des lettres.',
                    ]),
                ],
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
            'include_responsabilite' => true,
        ]);

        // Ajoutez une contrainte sur l'option 'include_responsabilite' pour qu'elle soit un booléen
        $resolver->setAllowedTypes('include_responsabilite', 'bool');
    }
}
