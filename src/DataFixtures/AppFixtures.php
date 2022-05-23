<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Stage;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $Faker = Factory::create('fr_FR');
        // $product = new Product();
        // $manager->persist($product);
        
        for($i=1; $i<=100; $i++){
        $s1= new Stage();
        $s1->setSujet($Faker->realText());
        $s1->setEntreprise($Faker->company());
        $s1->setDateDebut($Faker->dateTime());
        $s1->setDateFin($Faker->dateTime());
        $s1->setDescription($Faker->realText());
        $manager->persist($s1);
        }

        $manager->flush();
    }
}
