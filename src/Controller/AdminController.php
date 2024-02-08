<?php

namespace App\Controller;


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
    EquipePaginationService $equipePaginationService)

    {
        $this->responsablePaginationService = $responsablePaginationService;
        $this->stagiairePaginationService = $stagiairePaginationService;
        $this->reunionPaginationService = $reunionPaginationService;
        $this->equipePaginationService = $equipePaginationService;
    }


    #[Route('/admin/', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/connexion.html.twig');
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
}
