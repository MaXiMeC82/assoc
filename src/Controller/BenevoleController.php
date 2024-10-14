<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BenevoleController extends AbstractController
{
    #[Route('/benevole', name: 'app_benevole')]
    public function index(): Response
    {
        return $this->render('pages/benevole.html.twig');
    }
}
