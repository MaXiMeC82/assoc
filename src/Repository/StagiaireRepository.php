<?php

namespace App\Repository;

use App\Entity\Stagiaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @extends ServiceEntityRepository<Stagiaire>
 *
 * @method Stagiaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stagiaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stagiaire[]    findAll()
 * @method Stagiaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StagiaireRepository extends ServiceEntityRepository

{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stagiaire::class);
    }

    public function countStagiaire(): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    // Méthode modifier le status d'un stagiaire (archiver)
    public function save(Stagiaire $stagiaire)
    {
        $this->_em->persist($stagiaire);
        $this->_em->flush();
    }

    // Méthode pour mettre à jour les données d'un stagiaire
    public function updateStagiaire(Stagiaire $stagiaire, array $newData)
    {
        if (array_key_exists('nom', $newData)) {
            $stagiaire->setNom($newData['nom']);
        }
        if (array_key_exists('prenom', $newData)) {
            $stagiaire->setPrenom($newData['prenom']);
        }
        if (array_key_exists('email', $newData)) {
            $stagiaire->setEmail($newData['email']);
        }
        if (array_key_exists('numdeTelephone', $newData)) {
            $stagiaire->setNumDeTelephone($newData['numdeTelephone']);
        }
        // Ajoutez d'autres champs à mettre à jour si nécessaire

        $this->_em->flush();
    }
}


//    /**
//     * @return Stagiaire[] Returns an array of Stagiaire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Stagiaire
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
