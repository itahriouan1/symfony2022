<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnseignantController extends AbstractController
{
    /**
     * @Route("/enseignant", name="app_enseignant")
     */
    public function index(): Response
    {
        if($this->isGranted('ROLE_ENSEIGNANT')){
            return $this->render('enseignant/index.html.twig', [
                'controller_name' => 'EnseignantController',
            ]);
        }
        else{
            return $this->redirectToRoute('app_login');
        }
        
    }
}
