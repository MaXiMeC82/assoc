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
    private ?\DateTimeInterface $dater = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\Column(length: 8000)]
    private ?string $comments = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDater(): ?\DateTimeInterface
    {
        return $this->dater;
    }

    public function setDater(\DateTimeInterface $dater): static
    {
        $this->dater = $dater;

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
