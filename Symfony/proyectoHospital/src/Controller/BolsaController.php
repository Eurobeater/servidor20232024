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
