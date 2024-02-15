<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BolsaController extends AbstractController
{
    #[Route('/bolsa', name: 'app_bolsa')]
    public function index(): Response
    {
        return $this->render('bolsa/index.html.twig', [
            'controller_name' => 'BolsaController',
        ]);
    }
}
