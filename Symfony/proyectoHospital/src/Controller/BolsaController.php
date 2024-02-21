<?php

namespace App\Controller;

use App\Entity\Bolsa;
use App\Form\BolsaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\BrowserKit\Request;                                                         
use Symfony\Component\HttpFoundation\Request;                                                            
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BolsaController extends AbstractController
{
    #[Route('/bolsa', name: 'app_bolsa')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response                                    //para evitar que salga el error de 
    {
        $bolsa = new Bolsa();                                                                               
        $form = $this->createForm(BolsaType::class, $bolsa);                                              
        
        $form->handleRequest($request); 

        if ( $form->isSubmitted() && $form->isValid()) {      
            $puesto = $bolsa->getPuesto();                                                                          //obtener el puesto de trabajo Puesto de la bolsa                                          

            if ( $puesto && $puesto->getFechaCaducidad() < new \DateTime()) {                                       //si la fecha de caducidad (establecida en la base de datos) es inferior a la fecha actual, no se envia y muestra mensaje
                $this->addFlash("error", "La fecha de caducidad de la bolsa de trabajo ha pasado");
                return $this->redirectToRoute("app_bolsa");
            }
            
            $entityManager->persist($bolsa);                                                                    
            $entityManager->flush();                                                                               
            
            $this->addFlash("success","Sus datos se han enviado exitosamente");                                         
            
            return $this->redirectToRoute("app_inicio");                                                                                                                     
        }

        return $this->render('bolsa/index.html.twig', [
            'bolsa' => $bolsa,
            'form' => $form->createView(),
        ]);
    }
}
