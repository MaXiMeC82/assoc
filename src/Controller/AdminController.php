<?php

namespace App\Controller;

use App\Entity\Responsable;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ResponsableRepository;
use App\Service\ResponsableManagerService;
use App\Service\ResponsablePaginationService;



class AdminController extends AbstractController
{
    private $responsablePaginationService;

    public function __construct(ResponsablePaginationService $responsablePaginationService)
    {
        $this->responsablePaginationService = $responsablePaginationService;
    }

    #[Route('/admin/', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    #[Route('/admin/monprofil', name: 'app_admin_profil_perso')]
    public function profilPerso(): Response
    {
        return $this->render('admin/profilPerso.html.twig');
    }
    #[Route('/admin/profil/{id<\d+>}', name: 'app_admin_profil')]
    public function profil(ResponsableManagerService $responsableService, $id): Response
    {
        $responsables = $responsableService->findResponsableById($id);
        
        if (!$responsables) {
            return $this->redirectToRoute('app_admin_responsable');
        }
        return $this->render('admin/profil.html.twig', ['responsables' => $responsables]);
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

    #[Route('/admin/stagiaire', name: 'app_admin_stagiaire')]
    public function stagiaireList(): Response
    {
        return $this->render('admin/listStagiaire.html.twig');
    }
    #[Route('/admin/reunion', name: 'app_admin_reunion')]
    public function reunionList(): Response
    {
        return $this->render('admin/listReunion.html.twig');
    }
    #[Route('/admin/equipe', name: 'app_admin_equipe')]
    public function equipeList(): Response
    {
        return $this->render('admin/listEquipe.html.twig');
    }
}
