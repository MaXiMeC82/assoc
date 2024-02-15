<?php

namespace App\Service;

use App\Entity\Equipe;
use App\Entity\Reunion;
use App\Entity\Responsable;
use App\Entity\Stagiaire;
use Doctrine\Persistence\ManagerRegistry;

class ManagerService
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function findEquipeById($id): ?Equipe
    {
        $repository = $this->doctrine->getRepository(Equipe::class);
        return $repository->find($id);
    }
    public function findReunionById($id): ?Reunion
    {
        $repository = $this->doctrine->getRepository(Reunion::class);
        return $repository->find($id);
    }
    public function findResponsableById($id): ?Responsable
    {
        $repository = $this->doctrine->getRepository(Responsable::class);
        return $repository->find($id);
    }
    public function findStagiaireById($id): ?Stagiaire
    {
        $repository = $this->doctrine->getRepository(Stagiaire::class);
        return $repository->find($id);
    }
}