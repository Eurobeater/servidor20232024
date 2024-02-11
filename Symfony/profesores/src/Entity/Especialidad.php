<?php

namespace App\Entity;

use App\Repository\EspecialidadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspecialidadRepository::class)]
class Especialidad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'especialidad', targetEntity: Profesor::class)]
    private Collection $especialidad;

    public function __construct()
    {
        $this->especialidad = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Profesor>
     */
    public function getEspecialidad(): Collection
    {
        return $this->especialidad;
    }

    public function addEspecialidad(Profesor $especialidad): static
    {
        if (!$this->especialidad->contains($especialidad)) {
            $this->especialidad->add($especialidad);
            $especialidad->setEspecialidad($this);
        }

        return $this;
    }

    public function removeEspecialidad(Profesor $especialidad): static
    {
        if ($this->especialidad->removeElement($especialidad)) {
            // set the owning side to null (unless already changed)
            if ($especialidad->getEspecialidad() === $this) {
                $especialidad->setEspecialidad(null);
            }
        }

        return $this;
    }
}
