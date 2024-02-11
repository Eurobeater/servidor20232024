<?php
// src/Controller/FactorialController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// ...

class FactorialController extends AbstractController
{
    #[Route('/factorial/factorial/{id}')]
    public function factorial($id): Response
    {
        //$number = random_int(0, 100);
        if ($id == 1 || $id == 0) {
            $factorial = 1;
        }else {
            $factorial = 1;
            for ($i=1; $i < $id; $i++) { 
                $factorial = $factorial * $i;
            }
        }

        return $this->render('factorial/factorial.html.twig', [
            //'number' => "El factorial es {$factorial}" ]);
            'number' => $factorial]);
            
    }
}
?>