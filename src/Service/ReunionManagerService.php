<?php

namespace App\Service;

use App\Entity\Reunion;
use Doctrine\Persistence\ManagerRegistry;

class ReunionManagerService
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function findResponsableById($id): ?Reunion
    {
        $repository = $this->doctrine->getRepository(Reunion::class);
        return $repository->find($id);
    }
}