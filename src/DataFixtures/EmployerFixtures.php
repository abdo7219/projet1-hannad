<?php

namespace App\DataFixtures;

use App\Entity\Employer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EmployerFixtures extends Fixture
{
    
    public function load(ObjectManager $manager): void
    
    {for($i = 1; $i <= 5; $i++){
        
        $employer = new Employer;
        $employer->setPrenom("prenom$i")->setNom("nom$i")->setTelephone("0000000000$i")->setEmail("email@email.email")->setAdresse("15 rue lenoir 75000 ville ")->setPoste("directeur")->setSalaire(4000)->setDatedenaissance(new \DateTime);

        
        $manager->persist($employer);

    }
        

        
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
