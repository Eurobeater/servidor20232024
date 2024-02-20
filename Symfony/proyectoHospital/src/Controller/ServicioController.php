<?php

namespace App\Controller;

use App\Entity\Servicio;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServicioController extends AbstractController
{
    #[Route('/servicio', name: 'app_servicio')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $servicios = $entityManager->getRepository(Servicio::class)->findAll();                             

        if (!$servicios) {                                                                                       
            throw $this->createNotFoundException('No se encontró el servicio.');
        }                                                                  

        return $this->render("servicio/index.html.twig", array(
            'servicios' => $servicios));                                                                      
    }


    #[Route('/app_servicio_detalles/{id}', name: 'app_servicio_detalles')]
    public function servicioDetalles(int $id, EntityManagerInterface $entityManager) {                          
        $servicio = $entityManager->getRepository(Servicio::class)->find($id);                                //guardar el objeto Servicio entero, con sus propiedades y todo          
        $especialidad = $servicio->getEspecialidad();

        // Obtener los médicos asociados a la especialidad del servicio
        $medicos = $servicio->getEspecialidad()->getMedicos();


        if (!$servicio) {                                                                                       
            throw $this->createNotFoundException('No se encontró el servicio.');
        }                                               

        return $this->render("servicio/servicioDetalles.html.twig", array(
            'servicio' => $servicio,
            'medicos' => $medicos
        ));                                                                      
    }
}