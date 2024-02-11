<?php

namespace App\Controller;

use App\Entity\Medico;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InicioController extends AbstractController
{
    #[Route('/', name: 'app_inicio')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $medicos = $entityManager->getRepository(Medico::class)->findAll();
        return $this->render("inicio/inicio.html.twig", array('medicos' => $medicos));
    }
}
