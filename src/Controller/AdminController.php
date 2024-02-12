<?php

namespace App\Controller;

use App\Entity\Responsable;
use App\Form\ResponsableType;
use App\Entity\Stagiaire;
use App\Form\StagiaireType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ResponsableManagerService;
use App\Service\ResponsablePaginationService;
use App\Service\StagiaireManagerService;
use App\Service\StagiairePaginationService;
use App\Service\ReunionPaginationService;
use App\Service\ReunionManagerService;
use App\Service\EquipePaginationService;
use App\Service\EquipeManagerService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;




class AdminController extends AbstractController
{
    private $responsablePaginationService;
    private $stagiairePaginationService;
    private $reunionPaginationService;
    private $equipePaginationService;
    


    public function __construct(
        ResponsablePaginationService $responsablePaginationService,
        StagiairePaginationService $stagiairePaginationService,
        ReunionPaginationService $reunionPaginationService,
        EquipePaginationService $equipePaginationService,
        
    ) {
        $this->responsablePaginationService = $responsablePaginationService;
        $this->stagiairePaginationService = $stagiairePaginationService;
        $this->reunionPaginationService = $reunionPaginationService;
        $this->equipePaginationService = $equipePaginationService;
        
    }


    #[Route('/admin/', name: 'app_admin')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $responsable = new Responsable();
        $form = $this->createForm(ResponsableType::class, $responsable, [
            'include_responsabilite' => false, // Ne pas inclure le champ 'responsabilite'
        ]);

        $form->remove('nom');
        $form->remove('prenom');
        $form->remove('num_de_telephone');
        $form->remove('is_archived');
        $form->remove('is_validated');
        $form->remove('responsabilite');
        $form->remove('submit');

        return $this->render('admin/connexion.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/admin/monprofil', name: 'app_admin_profil_perso')]
    public function profilPerso(): Response
    {
        return $this->render('admin/profilPerso.html.twig');
    }
    #[Route('/admin/profil/responsable/{id<\d+>}', name: 'app_admin_profil')]
    public function profil(ResponsableManagerService $responsableService, $id): Response
    {
        $responsables = $responsableService->findResponsableById($id);

        if (!$responsables) {
            return $this->redirectToRoute('app_admin_responsable');
        }
        return $this->render('admin/profil.html.twig', ['responsables' => $responsables]);
    }

    #[Route('/admin/profil/stagiaire/{id<\d+>}', name: 'app_admin_profilS')]
    public function profilS(StagiaireManagerService $stagiaireService, $id): Response
    {
        $stagiaire = $stagiaireService->findStagiaireById($id);

        if (!$stagiaire) {
            return $this->redirectToRoute('app_admin_responsable');
        }
        return $this->render('admin/profilS.html.twig', ['stagiaire' => $stagiaire]);
    }



    #[Route('/admin/responsable/{page?1}/{nbre?8}', name: 'app_admin_responsable')]
    public function responsableList($page, $nbre): Response
    {
        $nbResponsable = $this->responsablePaginationService->countResponsables();
        $nbrePage = ceil($nbResponsable / $nbre);

        $responsables = $this->responsablePaginationService->getResponsables($page, $nbre);

        return $this->render('admin/listResponsable.html.twig', [
            'responsables' => $responsables,
            'isPaginated' => true,
            'nbrePage' => $nbrePage,
            'page' => $page,
            'nbre' => $nbre
        ]);
    }

    #[Route('/admin/stagiaire/{page?1}/{nbre?8}', name: 'app_admin_stagiaire')]
    public function stagiaireList($page, $nbre): Response
    {
        $nbStagiaire = $this->stagiairePaginationService->countStagiaire();
        $nbrePage = ceil($nbStagiaire / $nbre);

        $stagiaire = $this->stagiairePaginationService->getStagiaire($page, $nbre);

        return $this->render('admin/listStagiaire.html.twig', [
            'stagiaire' => $stagiaire,
            'isPaginated' => true,
            'nbrePage' => $nbrePage,
            'page' => $page,
            'nbre' => $nbre
        ]);
    }

    #[Route('/admin/reunion/{page?1}/{nbre?8}', name: 'app_admin_reunion')]
    public function reunionList($page, $nbre): Response
    {
        $nbReunion = $this->reunionPaginationService->countReunion();
        $nbrePage = ceil($nbReunion / $nbre);

        $reunions = $this->reunionPaginationService->getReunion($page, $nbre);

        return $this->render('admin/listReunion.html.twig', [
            'reunions' => $reunions,
            'isPaginated' => true,
            'nbrePage' => $nbrePage,
            'page' => $page,
            'nbre' => $nbre
        ]);
    }

    #[Route('/admin/equipe/{page?1}/{nbre?8}', name: 'app_admin_equipe')]
    public function equipeList($page, $nbre): Response
    {
        $nbEquipe = $this->equipePaginationService->countEquipe();
        $nbrePage = ceil($nbEquipe / $nbre);

        $equipes = $this->equipePaginationService->getEquipe($page, $nbre);

        return $this->render('admin/listEquipe.html.twig', [
            'equipes' => $equipes,
            'isPaginated' => true,
            'nbrePage' => $nbrePage,
            'page' => $page,
            'nbre' => $nbre
        ]);
    }

    #[Route('/admin/addEmploye', name: 'app_admin_add')]
    public function addAdmin(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $responsable = new Responsable();
        $form = $this->createForm(ResponsableType::class, $responsable, [
            'include_responsabilite' => true, // Ne pas inclure le champ 'responsabilite'
        ]);

        $form->remove('is_archived');
        $form->remove('is_validated');
        $form->remove('num_de_telephone');
        $form->remove('connexion');

        // mon formulaire va aller traiter la requete 
        $form->handleRequest($request);

        // est ce que le formulaire  a été soumis
        if ($form->isSubmitted()) {

            $manager = $doctrine->getManager();
            $manager->persist($responsable);

            $manager->flush();

            return $this->redirectToRoute('app_admin_responsable');
        } else {

            return $this->render('admin/ajoutAdmin.html.twig', [
                'form' => $form->createView()
            ]);
        }
    }
    #[Route('/admin/addStagiaire', name: 'app_admin_add_stagiaire')]
    public function addResponsable(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $stagiaire = new Stagiaire();
        $form = $this->createForm(StagiaireType::class, $stagiaire);

        $form->remove('is_archived');
        $form->remove('is_validated');
        $form->remove('num_de_telephone');
        $form->remove('datestage');
        $form->handleRequest($request);

        // est ce que le formulaire  a été soumis
        if ($form->isSubmitted()) {
            $manager = $doctrine->getManager();
            $manager->persist($stagiaire);
            $manager->flush();
            return $this->redirectToRoute('app_admin_stagiaire');
        } else {
            return $this->render('admin/ajoutStagiaire.html.twig', [
                'form' => $form->createView()
            ]);
        }
    }

    // #[Route('/admin/connexion', name: 'app_admin_connexion')]
    // public function connexion(ManagerRegistry $doctrine, Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    // {
    //     $entityManager = $doctrine->getManager();
    //     $responsable = new Responsable();
    //     $form = $this->createForm(ResponsableType::class, $responsable, [
    //         'include_responsabilite' => true, // Ne pas inclure le champ 'responsabilite'
    //     ]);
    
    //     $form->remove('is_archived');
    //     $form->remove('is_validated');
    //     $form->remove('num_de_telephone');
    //     $form->remove('nom');
    //     $form->remove('prenom');
    //     $form->remove('responsabilite');
    //     $form->remove('submit');
    
    //     // mon formulaire va aller traiter la requete 
    //     $form->handleRequest($request);
    
    //     // est ce que le formulaire  a été soumis
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         // Récupérez les données du formulaire
    //         $data = $form->getData();
    
    //         // Recherchez l'utilisateur dans la base de données en fonction de l'email saisi
    //         $responsableRepository = $doctrine->getRepository(Responsable::class);
    //         $user = $responsableRepository->findOneBy(['email' => $data->getEmail()]);
    
    //         // Si l'utilisateur existe et que le mot de passe est correct
    //         if ($user && $passwordEncoder->isPasswordValid($user, $data->getPassword())) {
    //             // Connectez l'utilisateur (vous devrez peut-être implémenter cette fonctionnalité si elle n'est pas déjà faite)
    
    //             // Redirigez l'utilisateur vers une autre page une fois connecté
    //             return $this->redirectToRoute('nom_de_la_route_vers_la_page_de_connexion_réussie');
    //         } else {
    //             // Affichez un message d'erreur si les informations d'identification sont incorrectes
    //             $this->addFlash('danger', 'Adresse e-mail ou mot de passe incorrect');
    //         }
    //     }
    
    //     return $this->render('admin/connexion.html.twig', [
    //         'form' => $form->createView()
    //     ]);
    // }
    
}
