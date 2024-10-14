<?php

namespace App\Form;

use App\Entity\Reunion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ReunionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dater', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Date de la réunion',
                'required' => true, // Rendre ce champ requis
            ])
            ->add('lieu', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Lieu de la réunion',
                'required' => true, // Rendre ce champ requis
            ])
            ->add('comments', TextareaType::class, [ // Utilisation de TextareaType au lieu de null
                'attr' => ['class' => 'form-control mb-5'], // Ajoutez les attributs de classe ou d'autres attributs ici
                'label' => 'Commentaires', // Label du champ
                'required' => false, // Rendre ce champ facultatif si nécessaire
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-primary btn-block mb-4 mt-4']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reunion::class,
        ]);
    }
}
