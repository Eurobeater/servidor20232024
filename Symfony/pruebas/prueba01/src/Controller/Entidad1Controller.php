<?php

namespace App\Controller;

use App\Entity\Entidad01;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Entidad1Controller extends AbstractController
{
    #[Route('/entidad1', name: 'app_entidad1')]
    public function listar(): Response
    {
        $nombre = "Mister";
        $apellido = "X";
        $edad = 0;

        return $this->render('entidad1/entidad1.html.twig', [
            'nombre' => $nombre, 'apellido' => $apellido, 'edad' => $edad
        ]);
    }

    #[Route('/entidad1/{id}', name: 'listarEntidad')]
    public function listarEntidad(EntityManagerInterface $entityManager, int $id): Response
    {
        $persona = $entityManager->getRepository(Entidad01::class)->find($id);

        if (!$persona) {
            throw $this->createNotFoundException(
                'No se encontro persona con la id '.$id
            );
        }

        //return new Response($persona->getName());
        return $this->render('entidad1/entidad1.html.twig', ['persona' => $persona]);

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}
