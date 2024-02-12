<?php 

namespace App\Service;

use App\Entity\Stagiaire;
use App\Form\StagiaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class FormStagiaireService
{
    private $entityManager;
    private $formFactory;

    public function __construct(EntityManagerInterface $entityManager, FormFactoryInterface $formFactory)
    {
        $this->entityManager = $entityManager;
        $this->formFactory = $formFactory;
    }

    public function handleForm(Request $request): ?Stagiaire
    {
        $stagiaire = new Stagiaire();
        $form = $this->formFactory->create(StagiaireType::class, $stagiaire);

        // Traitement du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $this->entityManager->persist($stagiaire);
            $this->entityManager->flush();

            return $stagiaire;
        }

        return null;
    }
}
