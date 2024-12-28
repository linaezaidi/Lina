<?php

namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonType;
use App\Repository\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return new Response("hello world !");
    }
    #[Route(path: "/about", name:"app_about")]
    public function about():Response
    {
        return new Response(content:"hello world 2");
    }
    #[Route(path:'/home', name: 'app_home' ) ]
    
    public function home(): Response
    {
    $text = "Hello This is home !";
    $tabYear = [2020,2021,2022,2023];
    return $this->render(view: 'dummy/home.html.twig',parameters: [
    "text" => $text,
    "years" => $tabYear
    
     ]);
    }
    #[Route(path:'/displayform', name: 'app_displayform' ) ]
    public function displayForm(Request $request): Response
    {
        $lina= new Person();
        $linaForm=$this->createForm(PersonType::class,$lina);
        return $this->render(view: 'home/displayForm.html.twig',parameters: [
        
        "form"=>$linaForm
         ]);
     }
}
