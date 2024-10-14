<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuiSommesNousController extends AbstractController
{
    #[Route('/qui_sommes_nous', name: 'app_qui_sommes_nous')]
    public function index(): Response
    {
        return $this->render('pages/quiSommesNous.html.twig');
    }
}
