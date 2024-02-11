<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use App\Entity\Persona;                                             //he agregado esta linea para visualizar cada iteracion de la entidad Persona en la base de datos

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Response;


class PersonaController extends AbstractController
{
	public function persona()
    {

        //$personaRepository = $this->getDoctrine()->getRepository(Persona::class);
        //$personas = $personaRepository->findAll();

        $controllerName = "PersonaController";
        $templateName = "persona.html.twig";
        $personaRoute = "/persona";

        //return $this->render('persona/persona.html.twig', array( 'controllerName' => $controllerName, 'templateName' => $templateName, 'personaRoute' => $personaRoute));
        return $this->render('persona/persona.html.twig', [
            'controllerName' => $controllerName, 'templateName' => $templateName, 'personaRoute' => $personaRoute//, 'personas' => $personas
        ]);
    }
}