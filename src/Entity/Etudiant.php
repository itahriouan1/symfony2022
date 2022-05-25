<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant extends User
{

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $CNE;


    public function getCNE(): ?string
    {
        return $this->CNE;
    }

    public function setCNE(string $CNE): self
    {
        $this->CNE = $CNE;

        return $this;
    }
}
