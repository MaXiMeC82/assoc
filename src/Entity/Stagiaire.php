<?php

namespace App\Entity;

use App\Repository\StagiaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StagiaireRepository::class)]
class Stagiaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;


    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 10)]
    private ?string $num_de_telephone = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $type_de_presence = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url_du_cv = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datestage  = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_validated = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_archived = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumDeTelephone(): ?string
    {
        return $this->num_de_telephone;
    }

    public function setNumDeTelephone(string $num_de_telephone): static
    {
        $this->num_de_telephone = $num_de_telephone;

        return $this;
    }

    public function getTypeDePresence(): ?string
    {
        return $this->type_de_presence;
    }

    public function setTypeDePresence(?string $type_de_presence): static
    {
        $this->type_de_presence = $type_de_presence;

        return $this;
    }

    public function getUrlDuCv(): ?string
    {
        return $this->url_du_cv;
    }

    public function setUrlDuCv(?string $url_du_cv): static
    {
        $this->url_du_cv = $url_du_cv;

        return $this;
    }

    public function getDateDuStage(): ?\DateTimeInterface
    {
        return $this->datestage ;
    }

    public function setDateDuStage(?\DateTimeInterface $datestage ): static
    {
        $this->datestage  = $datestage ;

        return $this;
    }

    public function isIsValidated(): ?bool
    {
        return $this->is_validated;
    }

    public function setIsValidated(?bool $is_validated): static
    {
        $this->is_validated = $is_validated;

        return $this;
    }

    public function isIsArchived(): ?bool
    {
        return $this->is_archived;
    }

    public function setIsArchived(?bool $is_archived): static
    {
        $this->is_archived = $is_archived;

        return $this;
    }
}
