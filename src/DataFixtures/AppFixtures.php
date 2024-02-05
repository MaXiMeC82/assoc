<?php


namespace App\DataFixtures;

use App\Entity\Responsable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Ajoutez des données de test
        for ($i = 1; $i <= 10; $i++) {
            $responsable = new Responsable();
            $responsable->setNom('Nom' . $i);
            $responsable->setPrenom('Prenom' . $i);
            $responsable->setEmail('responsable' . $i . '@example.com');

            $manager->persist($responsable);
        }

        $manager->flush();
    }
}

