<?php 


namespace App\Service;

use App\Repository\ReunionRepository;

class ReunionPaginationService
{
    private $reunionRepository;

    public function __construct(ReunionRepository $reunionRepository)
    {
        $this->reunionRepository = $reunionRepository;
    }

    public function getReunion(int $page, int $nbre): array
    {
        $offset = ($page - 1) * $nbre;
        return $this->reunionRepository->findBy([], [], $nbre, $offset);
    }

    public function countReunion(): int
    {
        return $this->reunionRepository->countReunion();
    }
}
