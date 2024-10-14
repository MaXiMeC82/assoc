<?php


namespace App\Controller;

use App\Entity\Responsable;
use App\Repository\ResponsableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class SearchController extends AbstractController
{
    // #[Route('/admin/search', name: 'app_admin_search')]
    // public function search(ManagerRegistry $doctrine, Request $request)
    // {
    //     $query = $request->query->get('query');

    //     // Effectuer la recherche dans la base de données
    //     $users = $doctrine->getRepository(Responsable::class)->searchByName($query);

    //     // Renvoyer les résultats au format JSON
    //     return new JsonResponse($users);
    // }
}
