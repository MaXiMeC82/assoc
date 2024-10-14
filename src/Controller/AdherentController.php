<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdherentController extends AbstractController
{
    #[Route('/adherent', name: 'app_adherent')]
    public function index(): Response
    {
        return $this->render('pages/adherent.html.twig');
    }
}
