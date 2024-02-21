<?php

namespace App\Controller;

use App\Entity\Especialidad;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;  
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

    //CON PAGINACIÓN
    #[Route('/cuadro', name: 'app_cuadro')]
    public function cuadroMedico(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response {
        
        $query = $entityManager->createQuery('SELECT l FROM App\Entity\Especialidad l');
        $especialidades = $entityManager->getRepository(Especialidad::class)->findAll();

        // Paginar los resultados de la consulta
        $pagination = $paginator->paginate(                                                                                 //objeto paginator. instancia de PaginatorInterface. para paginar los resultados de la consulta
            // Consulta Doctrine, no resultados
            $query,
            // Definir el parámetro de la página
            $request->query->getInt('page', 1),                                                                             //el número de la página actual (por defecto)
            // Items per page                                                                                               //cuántos elementos mostrar por página
            5
        );

        return $this->render("cuadro/cuadro.html.twig", array('pagination' => $pagination, 'especialidades' => $especialidades));
    }

    //SIN PAGINACIÓN
/*
    #[Route('/cuadro', name: 'app_cuadro')]
    public function cuadroMedico(EntityManagerInterface $entityManager) {
        $especialidades = $entityManager->getRepository(Especialidad::class)->findAll();
        
        return $this->render("cuadro/cuadro.html.twig", array('especialidades' => $especialidades));
    }
*/
    //CON PAGINACIÓN
    #[Route('/app_especialidad_medico/{id}', name: 'app_especialidad_medico')]
    public function especialidadMedico(int $id, EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response {
        $especialidad = $entityManager->getRepository(Especialidad::class)->find($id);                              //obtener la especialidad por su id
                                                                                                                    //el query lo tuve que hacer con un join
        $query = $entityManager->createQuery('                                                                      
            SELECT m
            FROM App\Entity\Medico m
            JOIN m.especialidad e
            WHERE e.id = :especialidadId') 
                ->setParameter('especialidadId', $especialidad->getId());


        // Paginar los resultados de la consulta
        $pagination = $paginator->paginate(                                                                                 //objeto paginator. instancia de PaginatorInterface. para paginar los resultados de la consulta
            // Consulta Doctrine, no resultados
            $query,
            // Definir el parámetro de la página
            $request->query->getInt('page', 1),                                                                             //el número de la página actual (por defecto)
            // Items per page                                                                                               //cuántos elementos mostrar por página
            2
        );

        return $this->render("especialidadMedico/especialidadMedico.html.twig", array('pagination' => $pagination, 'especialidad' => $especialidad));                                          
    }

    //SIN PAGINACIÓN 
    //public function especialidadMedico(int $id, EntityManagerInterface $entityManager, Request $request) {
        //$especialidad = $entityManager->getRepository(Especialidad::class)->find($id);                              //obtener la especialidad por su id

        //if (!$especialidad) {                                                                                       //verificar si la especialidad existe
            //throw $this->createNotFoundException('No se encontró la especialidad.');
        //}

        //$medicos = $especialidad->getMedicos();                                                                     //obtener todos los médicos asociados con esta especialidad
        //$medicos = $entityManager->getRepository(Medico::class)->findBy(['especialidad' => $especialidad]);       //obtener todos los médicos asociados con esta especialidad

        //return $this->render("especialidadMedico/especialidadMedico.html.twig", array(
           // 'medicos' => $medicos,
           // 'especialidad' => $especialidad));                                                                    //pasar la especialidad al template si es necesario
    //}
}


