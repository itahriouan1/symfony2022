<?php

namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController{
    /**
     * @Route("/", name="index")
     * @return Response
     */

    public function index(){
        $x = 5;
        $t = [[1,2],[3,4]];
        $p = new stdClass();
        $p->nom='itahriouan';
        $p->prenom = 'zakaria';
        return $this->render('index.html.twig',['x' => $x , 't' => $t, 'p' => $p]);
    }
    /**
     * @Route("/home{n}", name="home")
     * @return Response
     */

    public function home($n){
        $html = "<p>lorem ....</p>";
        return $this->render('home.html.twig', ['n' => $n, 'html' => $html]);
    }
}