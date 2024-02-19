<?php


namespace App\Service;

use App\Repository\EquipeRepository;
use App\Repository\ResponsableRepository;
use App\Repository\StagiaireRepository;
use App\Repository\ReunionRepository;

class PaginationService
{
    private $equipeRepository;
    private $responsableRepository;
    private $stagiaireRepository;
    private $reunionRepository;

    public function __construct(EquipeRepository $equipeRepository, ResponsableRepository $responsableRepository, StagiaireRepository $stagiaireRepository, ReunionRepository $reunionRepository)
    {
        $this->equipeRepository = $equipeRepository;
        $this->responsableRepository = $responsableRepository;
        $this->stagiaireRepository = $stagiaireRepository;
        $this->reunionRepository = $reunionRepository;
    }

    public function getEquipe(int $page, int $nbre): array
    {
        $offset = ($page - 1) * $nbre;
        return $this->equipeRepository->findBy([], [], $nbre, $offset);
    }

    public function getResponsables(int $page, int $nbre): array
    {
        $offset = ($page - 1) * $nbre;
        return $this->responsableRepository->findBy([], [], $nbre, $offset);
    }

    public function getReunion(int $page, int $nbre): array
    {
        $offset = ($page - 1) * $nbre;
        return $this->reunionRepository->findBy([], [], $nbre, $offset);
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
    public function countReunion(): int
    {
        return $this->reunionRepository->countReunion();
    }

    public function countEquipe(): int
    {
        return $this->equipeRepository->countEquipe();
    }

    public function countResponsables(): int
    {
        return $this->responsableRepository->countResponsables();
    }
}
