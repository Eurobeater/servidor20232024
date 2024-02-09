<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Form\ApplicationType;
use App\Entity\Applicant;
use App\Entity\Company;
use App\Entity\CompanyOwner;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class OfferController extends AbstractController
{
    #[Route('/offer', name: 'app_offer')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $offers = $entityManager->getRepository(JobOffer::class)->findAll();                                //acceder al listado de las ofertas para mostrarlas. se obtiene el listado de la base de datos creando la variable $offers. se necesita consultar a la bd con el objeto EntityManager
        return $this->render('offer/index.html.twig', [                                                     //línea 18: la técnica se llama 'inyección de dependencias. decir al EntityManager que devuelva el repositorio de la clase de las ofertas (JobOffer::class)
            'offers' => $offers                                                                             //linea 18: utilizar un método tipo find (findAll para mostrar todas las ofertas disponibles). por último, proporcionar la informacion al template (render('offer/index.html.twig')) pasando por el array la variable 'offers'
        ]);
    }

    #[Route('/offer/apply', name: 'app_apply')]                                                               
    public function apply(Request $request, EntityManagerInterface $entityManager)                          //recibe los parámetros de la url. recibimos un objeto de tipo 'Request', guardandola en la variable $request.
    {
        $offerId = $request->get(key: 'offerId');                                                           //se guarda en una variable 'offerId' el parámetro que nos ha llegado por la url (método GET), es decir, el id de la oferta. (en la url se llama 'offerId')
                                                  
        $offer = $entityManager->getRepository(JobOffer::class)->find($offerId);                            //lo mismo que en la linea 18. solo que en vez de listar todo, se lista una en particular por id (la id de la oferta)
                                    
        return $this->render('offer/apply.html.twig', [                                                     //retornar en el template 'apply.html.twig' (ubicado en la carpeta /offer) el valor de la variable $offer en el array como 'offer' (envía la oferta específica por el id)
            'offer' => $offer
        ]);
    }
//FUNCIÓN APPLY CON PLACEHOLDER
    #[Route('/app_offer/{id}/apply', name: 'app_apply')]                                                    //MODO PLACEHOLDER: antes ('/offer/apply', name: 'app_apply'). para usar el Route de forma más eficiente con los placeholders (app_offer, app_apply)
    public function applyPlaceholder(int $id, EntityManagerInterface $entityManager)                        //MODO PLACEHOLDER: int $id es la id a pasar por parámetro en la url. el nombre $id debe coincidir con el parámetro de Route
    {                                        
        $offer = $entityManager->getRepository(JobOffer::class)->find($id);                                 //MODO PLACEHOLDER: buscar por el id recibido por el parámetro

        return $this->render('offer/apply.html.twig', [
            'offer' => $offer
        ]);
    }
//FUNCIÓN APPLY CON EXCEPCIÓN
    #[Route('/app_offer/{id}/apply', name: 'app_apply')]                                                    
    public function applyExcepcion(int $id, EntityManagerInterface $entityManager)                        
    {       
        if (!$offer = $entityManager->getRepository(JobOffer::class)->find($id)) {                          //lo mismo que las anteriores veces. si la oferta que ha sido pasada por parámetro no existe, salta una excepción de tipo httpNotFound (no se ha encontrado)
            throw new NotFoundHttpException();
        } 
            return $this->render('offer/apply.html.twig', [
                'offer' => $offer
            ]);
    }

    //FUNCIÓN APPLY SIN ID, USANDO JOBOFFER Y MAGIA 
    #[Route('/app_offer/{id}/apply', name: 'app_apply')]                                                    
    public function applyExcepcionJobOffer(JobOffer $offer)                             //en vez de buscar por id, busca por la oferta en sí. para no ir buscando ni trabajando con un número, sino con una oferta. con un objeto de tipo JobOffer
    {                                                                                   //linea 60: al hacer eso, no hace falta usar el EntityManagerInterface. si no encuentra la oferta, suelta la misma excepción que en la anterior función con el mecanismo de 'Reflection' (la magia)
            return $this->render('offer/apply.html.twig', [                             //linea 59. aunque se espera un 'id' en la ruta, symfony asume que el 'id' es una propiedad del objeto JobOffer.
                'offer' => $offer
            ]);
    }

     //FUNCIÓN APPLY CON FORM 
     #[Route('/app_offer/{id}/apply', name: 'app_apply')]                                                    
     public function applyForm(JobOffer $offer, Request $request, EntityManagerInterface $entityManager)            //necesario el Request y EntityManagerInterface (para guardar los datos en la base de datos). se tiene que importar un comando en la chuleta para procesar los datos
     {
        $applicant = new Applicant();                                                                               //se crea un nuevo objeto vacío de tipo Applicant (el aplicante a la oferta) 
        $form = $this->createForm(ApplicationType::class, $applicant);                                              //creamos una variable llamada $form. usamos el método createForm() para que cree el formulario. se indica el tipo de formulario a crear, referenciando a la clase del formulario (ApplicantType). también se pasa como parámetro el nuevo aplicante, ya que recibira los datos de la petición
        
        $form->handleRequest($request);                                                                             //hacer que el formulario maneje la petición, porque tiene que existir. se agrega como parametro el objeto $request

        if ( $form->isSubmitted() && $form->isValid()) {                                                            //si se envia y es valido, se hace el formulario
            $entityManager->persist($applicant);                                                                    //se envía el objeto $applicant al método persist(). el método persist() genera unas sentencias QL para guardar el objeto en la base de datos en la tabla que corresponda. persist() no ejecuta SQL, lo genera                                          
            $entityManager->flush();                                                                                //para que las sentencias SQL se ejecuten, se llama al metodo flush()
            
            $this->addFlash("success","Sus datos se han enviado exitosamente");                                         //para mostrar un mensaje en el template indicando que los datos del formulario se han enviado. el primer parámetro 'success' es el nombre del mensaje y el segundo parámetro es el contenido de éste
            
            return $this->redirectToRoute("app_offer");                                                                 //OPCION 1: redirigir a una página (template, donde las ofertas) que indica al usuario que sus datos han sido enviados usando el método addFlash()
            //return $this->redirectToRoute("app_confirmation");                                                        //OPCION 2: redirigir a una página (template) que indica al usuario que sus datos han sido enviados sin el addFlash(). sin usar el addFlash se deben comentar las líneas 82 y 84
        }

             return $this->render('offer/apply.html.twig', [             
                 'offer' => $offer,
                 'form' => $form->createView(),                                                                         //para que se visualice en el template, lo añadimos al array. para mostrar el formulario usamos el método createView() para que el objeto formulario se transforme en código html o twig
             ]);
     }

//PROCESAMIENTO DE FORMULARIO (SIN addFLash()). IMPORTANTE PARA applyForm()
     //#[Route('/offer/confirmation', name: 'app_confirmation')]
    //public function confirmationAction(): Response
    //{
        //return $this->render('confirmation.html.twig');
    //}


//LISTAR LAS OFERTAS QUE HAYAN SIDO PUBLICADAS POR LAS EMPRESAS

}


