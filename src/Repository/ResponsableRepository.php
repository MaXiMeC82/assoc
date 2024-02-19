<?php

namespace App\Repository;

use App\Entity\Responsable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<Responsable>
 *
 * @method Responsable|null find($id, $lockMode = null, $lockVersion = null)
 * @method Responsable|null findOneBy(array $criteria, array $orderBy = null)
 * @method Responsable[]    findAll()
 * @method Responsable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Responsable::class);
    }
    public function countResponsables(): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    // Méthode modifier le status d'un responsable (archiver)
    public function save(Responsable $responsable)
    {
        $this->_em->persist($responsable);
        $this->_em->flush();
    }

    // Méthode pour mettre à jour les données d'un responsable
    public function updateStagiaire(Responsable $stagiaire, array $newData)
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

    // public function searchByName($name)
    // {
    //     return $this->createQueryBuilder('r')
    //         ->where('r.nom LIKE :name')
    //         ->orWhere('r.prenom LIKE :name')
    //         ->setParameter('name', '%'.$name.'%')
    //         ->getQuery()
    //         ->getResult();
    // }
    //    /**
    //     * @return Responsable[] Returns an array of Responsable objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Responsable
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
