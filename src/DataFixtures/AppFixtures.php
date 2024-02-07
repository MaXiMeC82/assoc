<?php


namespace App\DataFixtures;

use App\Entity\Responsable;
use App\Entity\Stagiaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

    //    // Création du rôle admin
    //    $roleAdmin = new Role();
    //    $roleAdmin->setResponsabilite('admin');
    // //    $roleAdmin->setId('1');
    //    $manager->persist($roleAdmin);

    //     // Création du rôle admin
    //     $roleResponsable = new Role();
    //     $roleResponsable->setResponsabilite('responsable');
    //     // $roleResponsable->setId('2');
    //     $manager->persist($roleResponsable);

       // Ajout des données de test pour les responsables avec le rôle admin
       for ($i = 1; $i <= 10; $i++) {
           $responsable = new Responsable();
           $responsable->setNom('Nom' . $i);
           $responsable->setPrenom('Prenom' . $i);
           $responsable->setEmail('responsable' . $i . '@example.com');
           $responsable->setNumDeTelephone('0695' . $i . $i .'77' . '8' . $i );
           $responsable->setIsValidated(true); // définir isValidated à true
           $responsable->setIsArchived(false); // définir isArchived à true
        //    $responsable->setResponsabilite('admin'); // attribuer le rôle admin

            $manager->persist($responsable);
        }

        for ($i = 1; $i <= 10; $i++) {
            $stagiaire = new Stagiaire();
            $stagiaire->setNom('Nom' . $i);
            $stagiaire->setPrenom('Prenom' . $i);
            $stagiaire->setEmail('stagiaire' . $i . '@example.com');
            $stagiaire->setNumDeTelephone('0695' . $i . $i .'77' . '8' . $i );
            $stagiaire->setIsValidated(true); // définir isValidated à true
            $stagiaire->setIsArchived(false); // définir isArchived à true
         //    $stagiaire->setResponsabilite('admin'); // attribuer le rôle admin
 
             $manager->persist($stagiaire);
         }

        $manager->flush();
    }
}

