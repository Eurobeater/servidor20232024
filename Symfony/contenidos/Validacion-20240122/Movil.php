<?php

namespace App\Entity;

use App\Repository\MovilRepository;
use App\Validator as MyAssert;
use Doctrine\ORM\Mapping as ORM;


use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MovilRepository::class)]
class Movil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
	#[Assert\NotBlank]
	#[MyAssert\TelefonoMovil]
	 
    private ?string $numero = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): static
    {
        $this->numero = $numero;

        return $this;
    }
}
