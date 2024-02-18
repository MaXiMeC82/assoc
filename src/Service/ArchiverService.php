<?php



namespace App\Service;

use App\Repository\StagiaireRepository;
use App\Repository\ResponsableRepository;

class ArchiverService
{
    private $stagiaireRepository;
    private $responsableRepository;

    public function __construct(StagiaireRepository $stagiaireRepository, ResponsableRepository $responsableRepository)
    {
        $this->stagiaireRepository = $stagiaireRepository;
        $this->responsableRepository = $responsableRepository;
    }

    // Fonction pour archiver un stagiaire par son ID
    public function archiveStagiaireById(int $stagiaireId)
    {
        $stagiaire = $this->stagiaireRepository->find($stagiaireId);

        if ($stagiaire) {
            $stagiaire->setIsArchived(true);
            $this->stagiaireRepository->save($stagiaire);
        }
    }
    public function archiveResponsableById(int $responsableId)
    {
        $responsable = $this->responsableRepository->find($responsableId);

        if ($responsable) {
            $responsable->setIsArchived(true);
            $this->responsableRepository->save($responsable);
        }
    }
}
