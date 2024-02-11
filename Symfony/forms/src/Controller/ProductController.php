<?php
// src/Controller/ProductoController.php
namespace App\Controller;

//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// tipos form
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

// clase
use App\Entity\Product;



// Constraints
use Symfony\Component\Validator\Constraints\Currency;



#[Route("/producto")]

class ProductController extends AbstractController
{
      
	#[Route("/pruebaform")]
    public function pruebaForm( Request $request )
    {
       
      
        $form = $this->createFormBuilder()
        //->add('primero', TextType::class)
        //->add('segundo', TextType::class)
        //->add('Send', SubmitType::class)
        ->add('primero', MoneyType::class)
        ->add('Send', SubmitType::class)
        ->getForm();
 
       
        $form->handleRequest( $request );

         if ($form->isSubmitted() && $form->isValid()) {
            // array con valores form field => value
            $data = $form->getData();
            
			$primero = $data['primero'];
			//$segundo = $data['segundo'];
            
            /*
            if ($primero * 2 == $segundo) {                                     //si el primer campo multiplicado por 2 es igual al valor del segundo campo
                //$msg = "Has metido valores correctos {$primero} {$segundo}";
                $msg = "Has metido valores correctos {$primero}";
            }else {
                //$msg = "Has metido valores incorrectos {$primero} {$segundo}";
                $msg = "Has metido valores incorrectos {$primero}";
            }
            */
            $msg = "Has metido valores correctos {$primero}";
           
            
            return new Response( $msg );
        }
        else
            return $this->render('form.html.twig', array('form' => $form->createView(),));
    }
    
	
	
    
}
