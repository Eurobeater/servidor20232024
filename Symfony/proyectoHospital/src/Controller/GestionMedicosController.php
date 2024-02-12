<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionMedicosController extends AbstractController
{
    #[Route('/gestion/medicos', name: 'app_gestion_medicos')]
    public function index(): Response
    {
        return $this->render('gestion_medicos/index.html.twig', [
            'controller_name' => 'GestionMedicosController',
        ]);
    }
}
