<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student extends Person
{
  

    #[ORM\Column(length: 255)]
    private ?string $curso = null;

   

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): static
    {
        $this->curso = $curso;

        return $this;
    }
}
