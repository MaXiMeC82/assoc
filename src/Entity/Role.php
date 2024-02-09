<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Column(length: 20)]
    #[ORM\Id]
    private ?string $responsabilite = null;

    public function getResponsabilite(): ?string
    {
        return $this->responsabilite;
    }

    public function setResponsabilite(string $responsabilite): self
    {
        $this->responsabilite = $responsabilite;

        return $this;
    }
}
