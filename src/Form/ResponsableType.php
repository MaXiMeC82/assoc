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
            ->add('is_validated');

        // Ajoutez le champ 'responsabilite' si l'option 'include_responsabilite' est définie à true
        if ($options['include_responsabilite']) {
            $builder->add('responsabilite', CheckboxType::class, [
                'attr' => ['class' => 'form-check-input'],
                'required' => false,
                'label_attr' => ['class' => 'form-check-label'],
                'label' => 'Responsabilité'
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Responsable::class,
            'include_responsabilite' => true, // Par défaut, inclure le champ 'responsabilite'
        ]);

        // Ajoutez une contrainte sur l'option 'include_responsabilite' pour qu'elle soit un booléen
        $resolver->setAllowedTypes('include_responsabilite', 'bool');
    }
}
