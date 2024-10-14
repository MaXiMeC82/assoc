<?php

namespace App\Service;

use App\Entity\Equipe;
use App\Entity\Reunion;
use App\Entity\Responsable;
use App\Entity\Stagiaire;
use App\Repository\EquipeRepository;
use App\Repository\ReunionRepository;
use App\Repository\ResponsableRepository;
use App\Repository\StagiaireRepository;

class ManagerService
{
    private $equipeRepository;
    private $reunionRepository;
    private $responsableRepository;
    private $stagiaireRepository;

    public function __construct(
        EquipeRepository $equipeRepository,
        ReunionRepository $reunionRepository,
        ResponsableRepository $responsableRepository,
        StagiaireRepository $stagiaireRepository
    ) {
        $this->equipeRepository = $equipeRepository;
        $this->reunionRepository = $reunionRepository;
        $this->responsableRepository = $responsableRepository;
        $this->stagiaireRepository = $stagiaireRepository;
    }

    public function findEquipeById($id): ?Equipe
    {
        return $this->equipeRepository->find($id);
    }

    public function findReunionById($id): ?Reunion
    {
        return $this->reunionRepository->find($id);
    }

    public function findResponsableById($id): ?Responsable
    {
        return $this->responsableRepository->find($id);
    }

    public function findStagiaireById($id): ?Stagiaire
    {
        return $this->stagiaireRepository->find($id);
    }
}
