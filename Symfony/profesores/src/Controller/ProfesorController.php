<?php

// src/Controller/ProfesorController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Entity\Profesor;
use Doctrine\ORM\EntityManagerInterface;


class ProfesorController extends AbstractController
{
    #[Route('/profesor/insertar')]
    public function insertar(EntityManagerInterface $entityManager): Response
    {
        $profesor = new Profesor();
        $profesor->setNombre('Fernando');
        $profesor->setApellidos('Ruiz');
        // tell Doctrine you want to (eventually) save the profesor (no queries yet)
        $entityManager->persist($profesor);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        return $this->render('lucky/msg.html.twig', [
            'msg' => "insertado"
        ]);
    }
	
    #[Route('/profesor/listar')]
    public function listar(EntityManagerInterface $entityManager): Response
    {
        $profesores = $entityManager->getRepository(Profesor::class)->findAll();
        return $this->render('profesor/listado.html.twig', [
        "profesores" => $profesores
        ]);
    }
}