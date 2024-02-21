<?php

namespace App\Controller;

use App\Entity\Respuesta;
use App\Entity\Resultado;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Encuesta;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EncuestaController extends AbstractController
{
    #[Route('/encuestas', name: 'app_encuestas')]
    public function encuestas(EntityManagerInterface $entityManager): Response
    {
        $encuestas = $entityManager->getRepository(Encuesta::class)->findAll();
        return $this->render('encuesta/encuestas.html.twig', ['encuestas' => $encuestas]);
    }

    #[Route('/encuesta/{id}', name: 'app_encuesta')]
    public function encuesta(Request $request, $id, EntityManagerInterface $entityManager): Response
    {
        $encuesta = $entityManager->getRepository(Encuesta::class)->findOneById($id);          
        $form = $this->createFormBuilder();

        foreach ($encuesta->getPreguntas() as $pregunta) {
            $respuestas = [];
            foreach ($pregunta->getRespuestas() as $respuesta) {
                $respuestas[$respuesta->getId()] = $respuesta->getRespuesta();
            }

            $form->add('pregunta' . $pregunta->getId(), ChoiceType::class, [
                'choices' => $respuestas,
                'label' => $pregunta->getPregunta(),
                'expanded' => true
            ]);
        }
        /*
		$encuesta = $entityManager->getRepository(Encuesta::class)->findOneById($id);          
        // Construir el formulario
        $form = $this->createFormBuilder();
        foreach ($encuesta->getPreguntas() as $pregunta) {
        $opciones = [];
        foreach ($pregunta->getRespuestas() as $respuesta) {
        // Utilizar el texto descriptivo como clave y el ID de respuesta como valor
        $opciones[$respuesta->getRespuesta()] = $respuesta->getRespuesta();
        }

        $form->add('pregunta' . $pregunta->getId(), ChoiceType::class, [
        'choices' => $opciones, // Utilizar el array asociativo de opciones
        'label' => $pregunta->getPregunta(),
        'expanded' => true,
        ]);
        }
        */

        $form->add('Send', SubmitType::class);
        $form = $form->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            foreach ($data as $key => $value) {
                if (strpos($key, "pregunta") !== false) {
					$respuesta = $entityManager->getRepository(Respuesta::class)->findOneById($id); 
                    $resultado = new Resultado();
                    $resultado->setRespuesta($respuesta);
                    $em = $entityManager;
                    $em->persist($resultado);
                }
            }
            $em->flush();
            return new Response("Su encuesta ha sido registrada");
        }

        return $this->render('encuesta/encuesta_form.html.twig', ['form' => $form->createView()]);
    }
}
