<?php

namespace App\Controller;

use App\Entity\Responsable;
use App\Form\ResponsableType;

use App\Entity\Reunion;
use App\Form\ReunionType;

use App\Entity\Stagiaire;
use App\Form\StagiaireType;

use App\Entity\Equipe;
use App\Form\EquipeType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\PaginationService;
use App\Service\ManagerService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\StagiaireRepository;
use App\Repository\ResponsableRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Service\UpdateService;
use App\Service\ArchiverService;


class AdminController extends AbstractController
{
    private $responsablePaginationService;
    private $stagiairePaginationService;
    private $reunionPaginationService;
    private $equipePaginationService;
    private $archiverService;
    private $updateService;



    public function __construct(
        PaginationService $responsablePaginationService,
        PaginationService $stagiairePaginationService,
        PaginationService $reunionPaginationService,
        PaginationService $equipePaginationService,
        ArchiverService $archiverService,
        UpdateService $updateService,


    ) {
        $this->responsablePaginationService = $responsablePaginationService;
        $this->stagiairePaginationService = $stagiairePaginationService;
        $this->reunionPaginationService = $reunionPaginationService;
        $this->equipePaginationService = $equipePaginationService;
        $this->archiverService = $archiverService;
        $this->updateService = $updateService;
    }


    #[Route('/admin/monprofil', name: 'app_admin_profil_perso')]
    public function profilPerso(): Response
    {
        return $this->render('admin/profilPerso.html.twig');
    }

    #[Route('/admin/profil/responsable/{id<\d+>}', name: 'app_admin_profil')]
    public function profil(ManagerService $responsableService, $id, Request $request): Response
    {
        $responsables = $responsableService->findResponsableById($id);

        if (!$responsables) {
            return $this->redirectToRoute('app_admin_responsable');
        }
        if ($request->isMethod('POST')) {
            // Effectuer l'archivage du stagiaire
            $this->archiverService->archiveResponsableById($id);
            
        }
        return $this->render('admin/profil.html.twig', ['responsables' => $responsables]);
    }

    #[Route('/admin/profil/stagiaire/{id<\d+>}', name: 'app_admin_profilS')]
    public function profilS(ManagerService $stagiaireService, $id, Request $request): Response
    {
        $stagiaire = $stagiaireService->findStagiaireById($id);

        if (!$stagiaire) {
            return $this->redirectToRoute('app_admin_responsable');
        }
        if ($request->isMethod('POST')) {
            // Effectuer l'archivage du stagiaire
            $this->archiverService->archiveStagiaireById($id);
            
        }
        return $this->render('admin/profilS.html.twig', ['stagiaire' => $stagiaire]);
    }

    #[Route('/admin/reunion/{id<\d+>}', name: 'app_admin_detailReunion')]
    public function detailReunion(ManagerService $reunionManagerService, $id): Response
    {
        $reunion = $reunionManagerService->findReunionById($id);

        if (!$reunion) {
            return $this->redirectToRoute('app_admin_responsable');
        }
        return $this->render('admin/detailReunion.html.twig', ['reunion' => $reunion]);
    }

    #[Route('/admin/equipe/{id<\d+>}', name: 'app_admin_detailEquipe')]
    public function detailEquipe(ManagerService $equipeManagerService, $id): Response
    {
        $equipe = $equipeManagerService->findEquipeById($id);

        if (!$equipe) {
            return $this->redirectToRoute('app_admin_responsable');
        }
        return $this->render('admin/detailEquipe.html.twig', ['equipe' => $equipe]);
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
    #[Route('/admin/addReunion', name: 'app_admin_add_reunion')]
    public function addReunion(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $reunion = new Reunion();
        $form = $this->createForm(ReunionType::class, $reunion);


        // mon formulaire va aller traiter la requete 
        $form->handleRequest($request);

        // est ce que le formulaire  a été soumis
        if ($form->isSubmitted()) {

            $manager = $doctrine->getManager();
            $manager->persist($reunion);

            $manager->flush();

            return $this->redirectToRoute('app_admin_reunion');
        } else {

            return $this->render('admin/ajoutReunion.html.twig', [
                'form' => $form->createView()
            ]);
        }
    }
    #[Route('/admin/addEquipe', name: 'app_admin_add_equipe')]
    public function addEquipe(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $reunion = new Equipe();
        $form = $this->createForm(EquipeType::class, $reunion);


        // mon formulaire va aller traiter la requete 
        $form->handleRequest($request);

        // est ce que le formulaire  a été soumis
        if ($form->isSubmitted()) {

            $manager = $doctrine->getManager();
            $manager->persist($reunion);

            $manager->flush();

            return $this->redirectToRoute('app_admin_equipe');
        } else {

            return $this->render('admin/ajoutEquipe.html.twig', [
                'form' => $form->createView()
            ]);
        }
    }


    #[Route('/admin/reunion/addSt', name: 'app_admin_add_member_stagiaire', methods: ['GET'])]
    public function getStagiaires(StagiaireRepository $stagiaireRepository): JsonResponse
    {
        $stagiaires = $stagiaireRepository->findAll();
        return new JsonResponse($stagiaires);
    }

    #[Route('/admin/reunion/addRe', name: 'app_admin_add_Responsable', methods: ['GET'])]
    public function getResponsables(ResponsableRepository $responsableRepository): JsonResponse
    {
        $responsables = $responsableRepository->findAll();
        return new JsonResponse($responsables);
    }
    // #[Route('/admin/profil/modifStagiaire/{id}', name: 'app_admin_update_stagiaire')]
    // public function updateStagiaire(Request $request, Stagiaire $stagiaire): Response
    // {
    //     // Récupérer les nouvelles données du formulaire par exemple
    //     $newData = [
    //         'nom' => $request->request->get('nom'),
    //         'prenom' => $request->request->get('prenom'),
    //         'email' => $request->request->get('email'),
    //         // Ajoutez ici d'autres données si nécessaire
    //     ];

    //     // Appeler la méthode du service pour mettre à jour le profil du stagiaire
    //     $this->profilService->updateProfilStagiaire($stagiaire, $newData);


    //     return $this->redirectToRoute('admin/profil.html.twig');
    // }

    // #[Route('/admin/profil/modifResponsable/', name: 'app_admin_update_responsable')]
    // public function updateResponsable(Request $request, Responsable $responsable): Response
    // {
    //     // Récupérer les nouvelles données du formulaire par exemple
    //     $newData = [
    //         'nom' => $request->request->get('nom'),
    //         'prenom' => $request->request->get('prenom'),
    //         'email' => $request->request->get('email'),
    //         'numdetelephone' => $request->request->get('num_de_telephone'),
    //         // Ajoutez ici d'autres données si nécessaire
    //     ];

    //     // Appeler la méthode du service pour mettre à jour le profil du responsable
    //     $this->profilService->updateProfilResponsable($responsable, $newData);

    //     return $this->redirectToRoute('admin/profil.html.twig');
    // }
}
