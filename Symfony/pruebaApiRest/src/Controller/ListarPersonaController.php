<?php

namespace App\Controller;

use App\Repository\PersonaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ListarPersonaController extends AbstractController
{
    #[Route('/listar', name: 'app_listar_persona')]
    public function index(PersonaRepository $personaRepository): Response
    {

        $personas = $personaRepository->findAll();
        $personaJson = array();

        foreach ($personas as $persona) {
            $personaJson[] = [
                "nombre" => $persona->getNombre(),
                "edad" => $persona->getEdad(),
            ];
        }
        return $this->json($personaJson);
    }
}
