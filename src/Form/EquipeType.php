<?php

namespace App\Form;

use App\Entity\Competence;
use App\Entity\Equipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EquipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'attr' => ['class' => 'form-control mb-5'],
                'label' => 'Nom de l\'équipe',
                'required' => true, // Rendre ce champ requis
            ])
            ->add('dater', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Date de début',
                'required' => true, // Rendre ce champ requis
            ])
            ->add('datefin', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Date de fin',
                'required' => true, // Rendre ce champ requis
            ])
            ->add('nom', EntityType::class, [
                'required' => true,
                'class' => Competence::class,
                'label' => 'Secteur d\'activité',
                'attr' => [
                    'class' => 'select2 form-control mb-5'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-primary btn-block mb-4 mt-4']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipe::class,
        ]);
    }
}
