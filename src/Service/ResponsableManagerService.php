<?php

namespace App\Service;

use App\Entity\Responsable;
use Doctrine\Persistence\ManagerRegistry;

class ResponsableManagerService
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function findResponsableById($id): ?Responsable
    {
        $repository = $this->doctrine->getRepository(Responsable::class);
        return $repository->find($id);
    }
}