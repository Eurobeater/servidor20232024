<?php

namespace App\Controller;

use App\Entity\Citas;
use App\Entity\Especialidad;
use App\Entity\Medico;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MedicoController extends AbstractController
{
    #[Route('/medico', name: 'app_medico')]
    public function index(): Response
    {
        return $this->render('medico/index.html.twig', [
            'controller_name' => 'MedicoController',
        ]);
    }

    #[Route('/cuadro', name: 'app_cuadro')]
    public function cuadroMedico(EntityManagerInterface $entityManager) {
        $especialidades = $entityManager->getRepository(Especialidad::class)->findAll();

        return $this->render("cuadro/cuadro.html.twig", array('especialidades' => $especialidades));
    }

    #[Route('/app_especialidad_medico/{id}', name: 'app_especialidad_medico')]
    public function especialidadMedico(int $id, EntityManagerInterface $entityManager) {
        $especialidad = $entityManager->getRepository(Especialidad::class)->find($id);                              //obtener la especialidad por su id

        if (!$especialidad) {                                                                                       //verificar si la especialidad existe
            throw $this->createNotFoundException('No se encontró la especialidad.');
        }

        $medicos = $especialidad->getMedicos();                                                                     //obtener todos los médicos asociados con esta especialidad
        //$medicos = $entityManager->getRepository(Medico::class)->findBy(['especialidad' => $especialidad]);       //obtener todos los médicos asociados con esta especialidad

        return $this->render("especialidadMedico/especialidadMedico.html.twig", array(
            'medicos' => $medicos,
            'especialidad' => $especialidad));                                                                      //pasar la especialidad al template si es necesario
    }
}
