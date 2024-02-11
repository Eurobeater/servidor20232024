<?php

namespace App\Entity;

use App\Repository\RespuestaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RespuestaRepository::class)]
class Respuesta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'respuestas')]
    private ?Pregunta $pregunta = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $respuesta = null;

    #[ORM\OneToMany(mappedBy: 'respuesta', targetEntity: Resultado::class)]
    private Collection $resultados;

    public function __construct()
    {
        $this->resultados = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPregunta(): ?Pregunta
    {
        return $this->pregunta;
    }

    public function setPregunta(?Pregunta $pregunta): static
    {
        $this->pregunta = $pregunta;

        return $this;
    }

    public function getRespuesta(): ?string
    {
        return $this->respuesta;
    }

    public function setRespuesta(?string $respuesta): static
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * @return Collection<int, Resultado>
     */
    public function getResultados(): Collection
    {
        return $this->resultados;
    }

    public function addResultado(Resultado $resultado): static
    {
        if (!$this->resultados->contains($resultado)) {
            $this->resultados->add($resultado);
            $resultado->setRespuesta($this);
        }

        return $this;
    }

    public function removeResultado(Resultado $resultado): static
    {
        if ($this->resultados->removeElement($resultado)) {
            // set the owning side to null (unless already changed)
            if ($resultado->getRespuesta() === $this) {
                $resultado->setRespuesta(null);
            }
        }

        return $this;
    }
}
