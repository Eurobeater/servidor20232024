<?php

namespace App\Controller;

use App\Entity\Especialidad;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServicioController extends AbstractController
{
    #[Route('/servicio', name: 'app_servicio')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $especialidades = $entityManager->getRepository(Especialidad::class)->findAll();                              

        if (!$especialidades) {                                                                                       
            throw $this->createNotFoundException('No se encontró la especialidad.');
        }                                                                  

        return $this->render("servicio/index.html.twig", array(
            'especialidades' => $especialidades));                                                                      
    }


    #[Route('/app_servicio_detalles/{id}', name: 'app_servicio_detalles')]
    public function servicioDetalles(int $id, EntityManagerInterface $entityManager) {
        $especialidad = $entityManager->getRepository(Especialidad::class)->find($id);                              

        if (!$especialidad) {                                                                                       
            throw $this->createNotFoundException('No se encontró la especialidad.');
        }
            $especialidadNombre = $especialidad->getNombre();
            $especialidadId = $especialidad->getId();
            $controller_name = "servicioDetalles";                                                

        return $this->render("servicio/servicioDetalles.html.twig", array(
            'controller_name' => $controller_name,
            'especialidadNombre' => $especialidadNombre,
            'id' => $especialidadId));                                                                      
    }


    }


    


    /*

    #[Route('/servicio/{id}', name: 'app_servicio_detalles')]
    public function especialidad(int $id, EntityManagerInterface $entityManager) {
        $especialidad = $entityManager->getRepository(Especialidad::class)->find($id);                              //obtener la especialidad por su id

        if (!$especialidad) {                                                                                       //verificar si la especialidad existe
            throw $this->createNotFoundException('No se encontró la especialidad.');
        }

        $especialidades = $especialidad->getEspecialidad();
        
        return $this->render("servicio/servicioDetalles.html.twig", array(
            'especialidades' => $especialidades)); 
    }
    */
