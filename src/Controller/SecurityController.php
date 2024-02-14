<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use App\Entity\Responsable;
use App\Form\ResponsableType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }


    #[Route('/subscribe', name: 'app_admin_subscribe')]
    public function subscribe(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordEncoder): Response
    {
        $entityManager = $doctrine->getManager();
        $responsable = new Responsable();
        $form = $this->createForm(ResponsableType::class, $responsable, [
            'include_responsabilite' => false, // Ne pas inclure le champ 'responsabilite'
        ]);


        $form->remove('num_de_telephone');
        $form->remove('is_archived');
        $form->remove('is_validated');
        $form->remove('responsabilite');
        $form->remove('connexion');

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encodez le mot de passe
            $encodedPassword = $passwordEncoder->hashPassword($responsable, $responsable->getPassword());
            $responsable->setPassword($encodedPassword);

            // // Ajoutez le rôle ROLE_
            $responsable->setRoles(['ROLE_ADMIN']);
            $responsable->setResponsabilite('ROLE_ADMIN');

            $entityManager->persist($responsable);

            $entityManager->flush();

            // Redirigez l'utilisateur vers une autre page après l'enregistrement
            return $this->redirectToRoute('app_login');
        }

        return $this->render('admin/inscriptionCompte.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
