<?php

namespace App\Service;

use App\Entity\Stagiaire;
use Doctrine\Persistence\ManagerRegistry;

class StagiaireManagerService
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function findStagiaireById($id): ?Stagiaire
    {
        $repository = $this->doctrine->getRepository(Stagiaire::class);
        return $repository->find($id);
    }
}
