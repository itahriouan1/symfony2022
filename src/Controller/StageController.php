<?php

namespace App\Controller;

use App\Entity\Stage;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StageController extends AbstractController
{
    /**
     * @Route("/addStage", name="addStage")
     */
    public function add(ManagerRegistry $doctrine): Response
    {
        $s1= new Stage();
        $s1->setSujet('developpe');
        $s1->setEntreprise('SQLi');
        $s1->setDateDebut(new DateTime('2022-02-05'));
        $s1->setDateFin(new DateTime('2022-06-05'));
        $s1->setDescription('description');
        $manager= $doctrine->getManager();
        $manager->persist($s1);
        $manager->flush();


        return $this->render('stage/index.html.twig', [
            'controller_name' => 'StageController',
        ]);
    }
}
