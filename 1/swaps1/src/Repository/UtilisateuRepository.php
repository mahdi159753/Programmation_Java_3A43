<?php

namespace App\Repository;

use App\Entity\Utilisateu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Utilisateu>
 *
 * @method Utilisateu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateu[]    findAll()
 * @method Utilisateu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateu::class);
    }

//    /**
//     * @return Utilisateu[] Returns an array of Utilisateu objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Utilisateu
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
