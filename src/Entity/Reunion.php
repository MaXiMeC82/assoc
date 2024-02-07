<?php

namespace App\Entity;

use App\Repository\ReunionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReunionRepository::class)]
class Reunion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_de_la_reunion = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\Column(length: 8000)]
    private ?string $comments = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDeLaReunion(): ?\DateTimeInterface
    {
        return $this->date_de_la_reunion;
    }

    public function setDateDeLaReunion(\DateTimeInterface $date_de_la_reunion): static
    {
        $this->date_de_la_reunion = $date_de_la_reunion;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(string $comments): static
    {
        $this->comments = $comments;

        return $this;
    }
}
