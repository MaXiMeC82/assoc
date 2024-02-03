<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }
    #[Route('/admin/profil', name: 'app_admin_profil')]
    public function profil(): Response
    {
        return $this->render('admin/profil.html.twig');
    }
    #[Route('/admin/responsable', name: 'app_admin_responsable')]
    public function responsableList(): Response
    {
        return $this->render('admin/listResponsable.html.twig');
    }
    #[Route('/admin/stagiaire', name: 'app_admin_stagiaire')]
    public function stagiaireList(): Response
    {
        return $this->render('admin/listStagiaire.html.twig');
    }
}
