<?php

namespace App\Controller;

use App\Entity\Responsable;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
    #[Route('/admin/', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    #[Route('/admin/profil', name: 'app_admin_profil_perso')]
    public function profilPerso(): Response
    {
        return $this->render('admin/profilPerso.html.twig');
    }
    #[Route('/admin/profil/{id<\d+>}', name: 'app_admin_profil')]
    public function profil(ManagerRegistry $doctrine, $id): Response
    {
        $repository = $doctrine->getRepository(Responsable::class);
        $responsables = $repository->find($id);
        if (!$responsables) {
            $this->addFlash(type: 'error', message: "La personne d'id $id n'existe pas");
            return $this->redirectToRoute(route: 'app_admin_responsable');
        }
        return $this->render('admin/profil.html.twig',  ['responsables' => $responsables]);
    }
    #[Route('/admin/responsable', name: 'app_admin_responsable')]
    public function responsableList(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Responsable::class);
        $responsables = $repository->findAll();
        return $this->render('admin/listResponsable.html.twig', ['responsables' => $responsables]);
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
