<?php


namespace App\DataFixtures;

use App\Entity\Responsable;
use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

       // Création du rôle admin
       $roleAdmin = new Role();
       $roleAdmin->setResponsabilite('admin');
       $manager->persist($roleAdmin);

       // Ajout des données de test pour les responsables avec le rôle admin
       for ($i = 1; $i <= 6; $i++) {
           $responsable = new Responsable();
           $responsable->setNom('Nom' . $i);
           $responsable->setPrenom('Prenom' . $i);
           $responsable->setEmail('responsable' . $i . '@example.com');
           $responsable->setNumDeTelephone('0695' . $i . $i .'77' . '8' . $i );
           $responsable->setIsValidated(true); // définir isValidated à true
           $responsable->setIsArchived(true); // définir isArchived à true
        //    $responsable->addResponsabilite($roleAdmin); // attribuer le rôle admin

            $manager->persist($responsable);
        }

        $manager->flush();
    }
}

