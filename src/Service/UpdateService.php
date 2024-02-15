<?php

namespace App\Service;

use App\Entity\Stagiaire;
use App\Entity\Responsable;
use App\Repository\StagiaireRepository;
use App\Repository\ResponsableRepository;


class UpdateService
{
    private $stagiaireRepository;
    private $responsableRepository;

    public function __construct(StagiaireRepository $stagiaireRepository, ResponsableRepository $responsableRepository)
    {
        $this->stagiaireRepository = $stagiaireRepository;
    }

    public function updateStagiaire(Stagiaire $stagiaire, array $newData)
    {
        $this->stagiaireRepository->updateStagiaire($stagiaire, $newData);
    }

    public function updateResponsable(Responsable $responsable, array $newData)
    {
        $this->responsableRepository->updateResponsable($responsable, $newData);
    }
}
