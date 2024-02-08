<?php

namespace App\Service;

use App\Entity\Equipe;
use Doctrine\Persistence\ManagerRegistry;

class EquipeManagerService
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
}