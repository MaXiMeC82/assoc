<?php 


namespace App\Service;

use App\Repository\EquipeRepository;

class EquipePaginationService
{
    private $equipeRepository;

    public function __construct(EquipeRepository $equipeRepository)
    {
        $this->equipeRepository = $equipeRepository;
    }

    public function getEquipe(int $page, int $nbre): array
    {
        $offset = ($page - 1) * $nbre;
        return $this->equipeRepository->findBy([], [], $nbre, $offset);
    }

    public function countEquipe(): int
    {
        return $this->equipeRepository->countEquipe();
    }
}
