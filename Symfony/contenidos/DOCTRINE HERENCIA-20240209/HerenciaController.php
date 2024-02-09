<?php
// src/Controller/ProductoController.php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


use Doctrine\ORM\EntityManagerInterface;

// tipos form
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

// clase
use App\Entity\Person;
use App\Entity\Student;
use App\Entity\Teacher;

// form
use App\Form\PersonType;
use App\Form\StudentType;
use App\Form\TeacherType;


// Constraints
use Symfony\Component\Validator\Constraints\Currency;



#[Route("/herencia")]
class HerenciaController extends AbstractController
{
    
     #[Route("/student", name:"student")]
    
    public function student( EntityManagerInterface $entityManager, Request $request)
    {
       
        $student = new Student();
        $form = $this->createForm(StudentType::class, $student );
       
        $form->handleRequest( $request );

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($student);
            $entityManager->flush();
         
            return new Response( "Save");
        }
        else
            return $this->render('form.html.twig', array('form' => $form->createView(),));
    }
    
     #[Route("/teacher", name:"teacher")]
    
    public function teacher( EntityManagerInterface $entityManager, Request $request)
    {
       
        $teacher = new Teacher();
        $form = $this->createForm(TeacherType::class, $teacher );
       
        $form->handleRequest( $request );

        if ($form->isSubmitted() && $form->isValid()) {
           
            $entityManager->persist($teacher);
            $entityManager->flush();
         
            return new Response( "Save");
        }
        else
            return $this->render('form.html.twig', array('form' => $form->createView(),));
    }
    
    
}
