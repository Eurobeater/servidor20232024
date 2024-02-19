<?php

namespace App\Entity;

use App\Repository\BolsaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Telefono as AssertTelefono;
use App\Validator\CP as AssertCP
;
#[ORM\Entity(repositoryClass: BolsaRepository::class)]
class Bolsa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\ManyToOne(inversedBy: 'bolsas')]
    private ?Puesto $puesto = null;

    #[ORM\Column(length: 255)]
    private ?string $direccion = null;

    #[ORM\Column(length: 255)]
    #[AssertTelefono()]
    private ?string $telefono = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email()]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[AssertCP()]
    private ?string $cp = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPuesto(): ?Puesto
    {
        return $this->puesto;
    }

    public function setPuesto(?Puesto $puesto): static
    {
        $this->puesto = $puesto;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): static
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): static
    {
        $this->telefono = $telefono;

        return $this;
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

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): static
    {
        $this->cp = $cp;

        return $this;
    }
}
