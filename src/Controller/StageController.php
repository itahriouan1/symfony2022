<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Form\StageType;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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


        return $this->redirectToRoute('index');
    }

    /**
     * @Route("/showStage", name="showStage")
     */
    public function show(ManagerRegistry $managerRegistry): Response
    {
        $stages=$managerRegistry->getRepository(Stage::class)->findByEntreprise("SQLi");
        return $this->render('stage/show.html.twig',['stages'=>$stages]);
    }
    /**
     * @Route("/formStage", name="formStage")
     */
    public function form(ManagerRegistry $managerRegistry, Request $request): Response
    {
        $form = $this->createForm(StageType::class);
        $form->handleRequest($request);
        $formView =$form->createView();
        return $this->render('stage/form.html.twig',['form'=>$formView]);
    }
}
