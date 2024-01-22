<?php
// src/Controller/MenuController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


use App\Entity\Menu;
use App\Repository\MenuRepository;

class MenuController extends AbstractController
{
	private $menuRepository;
	
	public function __construct ( MenuRepository $menuRepository )
    {
			$this->menuRepository = $menuRepository;
	}
	#[Route("/menu_menu", name:"menu_menu")]
    public function menu(): Response
    {
		$menus = $this->menuRepository->findMenu();
		return $this->render('menu/menu.html.twig',array("menus"=>$menus));
    }   
	 
	
    #[Route("/menu_test",  name:"menu_test")]
     
	public function test(): Response
    {
        
        return $this->render('menu/test.html.twig');
    }   
  

}