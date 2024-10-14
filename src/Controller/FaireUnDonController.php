<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FaireUnDonController extends AbstractController
{
    #[Route('/faire/un/don', name: 'app_faire_un_don')]
    public function index(): Response
    {
        return $this->render('pages/faireUnDon.html.twig');
    }
}
