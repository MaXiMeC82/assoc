<?php 


namespace App\Service;

use App\Repository\ResponsableRepository;

class ResponsablePaginationService
{
    private $responsableRepository;

    public function __construct(ResponsableRepository $responsableRepository)
    {
        $this->responsableRepository = $responsableRepository;
    }

    public function getResponsables(int $page, int $nbre): array
    {
        $offset = ($page - 1) * $nbre;
        return $this->responsableRepository->findBy([], [], $nbre, $offset);
    }

    public function countResponsables(): int
    {
        return $this->responsableRepository->countResponsables();
    }
}
