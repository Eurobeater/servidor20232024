<?php

namespace App\Controller;

use App\Entity\Medico;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;  
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InicioController extends AbstractController
{
    //CON PAGINACIÓN
    #[Route('/', name: 'app_inicio')]
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $entityManager->createQuery('SELECT l FROM App\Entity\Medico l'); // Corregir la consulta DQL                          Crear consulta DQL para seleccionar todos los registros de la entidad 'Libro'. se construye con createQuery(), pasando la cadena DQL como parámetro

        // Paginar los resultados de la consulta
        $pagination = $paginator->paginate(                                                                                 //objeto paginator. instancia de PaginatorInterface. para paginar los resultados de la consulta
            // Consulta Doctrine, no resultados
            $query,
            // Definir el parámetro de la página
            $request->query->getInt('page', 1),                                                                             //el número de la página actual (por defecto)
            // Items per page                                                                                               //cuántos elementos mostrar por página
            5
        );

        //$medicos = $entityManager->getRepository(Medico::class)->findAll();
        return $this->render("inicio/inicio.html.twig", array('pagination' => $pagination));
    }

    //SIN PAGINACIÓN
    /*
    {
        #[Route('/', name: 'app_inicio')]
        public function index(EntityManagerInterface $entityManager): Response
        {
            $medicos = $entityManager->getRepository(Medico::class)->findAll();
            return $this->render("inicio/inicio.html.twig", array('medicos' => $medicos));
        }
    }
*/
}
