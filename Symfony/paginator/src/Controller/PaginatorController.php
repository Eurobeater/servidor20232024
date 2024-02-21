<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Libro; // Asegúrate de importar la entidad Libro correctamente

class PaginatorController extends AbstractController
{
    #[Route("/paginator", name:"paginator_listado")]
    public function index(Request $request, PaginatorInterface $paginator, EntityManagerInterface $em): Response
    {
        $query = $em->createQuery('SELECT l FROM App\Entity\Libro l'); // Corregir la consulta DQL                          Crear consulta DQL para seleccionar todos los registros de la entidad 'Libro'. se construye con createQuery(), pasando la cadena DQL como parámetro

        // Paginar los resultados de la consulta
        $pagination = $paginator->paginate(                                                                                 //objeto paginator. instancia de PaginatorInterface. para paginar los resultados de la consulta
            // Consulta Doctrine, no resultados
            $query,
            // Definir el parámetro de la página
            $request->query->getInt('page', 1),                                                                             //el número de la página actual (por defecto)
            // Items per page                                                                                               //cuántos elementos mostrar por página
            1
        );
        
        // Renderizar la vista de twig
        return $this->render('paginator/listado.html.twig', ['pagination' => $pagination]);                                 //mostrar el objeto pagination para mostrar en la vista la paginación
    }
}
