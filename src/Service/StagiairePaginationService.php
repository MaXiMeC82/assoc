<?php 


namespace App\Service;


use App\Repository\StagiaireRepository;

class StagiairePaginationService
{
    private $stagiaireRepository;

    public function __construct(StagiaireRepository $stagiaireRepository)
    {
        $this->stagiaireRepository = $stagiaireRepository;
    }

    public function getStagiaire(int $page, int $nbre): array
    {
        $offset = ($page - 1) * $nbre;
        return $this->stagiaireRepository->findBy([], [], $nbre, $offset);
    }

    public function countStagiaire(): int
    {
        return $this->stagiaireRepository->countStagiaire();
    }
}
