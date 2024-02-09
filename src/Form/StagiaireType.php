<?php

namespace App\Form;

use App\Entity\Stagiaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StagiaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('email', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Entrez votre adresse e-mail'],
                'label' => 'Adresse Email *'
            ])
            ->add('password', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => '******'],
                'label' => 'Mot de passe *'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-primary btn-block mb-4']
            ])
            ->add('nom', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Nom *'
            ])
            ->add('prenom', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Prénom *'
            ])
            ->add('num_de_telephone')
            ->add('type_de_presence', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Présence',
                'required' => false,
            ])
            ->add('url_du_cv', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'URL',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stagiaire::class,
        ]);
    }
}
