<?php

namespace App\Controller;

use App\Entity\Citas;
use App\Form\CitaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\BrowserKit\Request;                                                                 //no funciona con ésta importación el formulario
use Symfony\Component\HttpFoundation\Request;                                                               //con esta importación si funciona el formulario
use Symfony\Component\HttpFoundation\Response;                                                              //y con esta
use Symfony\Component\Routing\Annotation\Route;

class CitasController extends AbstractController
{
    #[Route('/citas', name: 'app_citas')]
    public function formCitas(EntityManagerInterface $entityManager, Request $request): Response
    {
        $citas = new Citas();
        $form = $this->createForm(CitaType::class, $citas);
        
        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid()) {                                                           
            $entityManager->persist($citas);                                                                    
            $entityManager->flush();                                                                                
            
            $this->addFlash("success","Sus datos se han enviado exitosamente");                                         
            
            return $this->redirectToRoute("app_inicio");                                                                                                                     
        }
        else
            return $this->render('/citas/citas.html.twig', array('citas' => $citas,'form' => $form->createView(),));
    }
}
