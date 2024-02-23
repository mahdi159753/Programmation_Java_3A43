<?php

namespace App\Repository;

use App\Entity\Reponsee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reponsee>
 *
 * @method Reponsee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reponsee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reponsee[]    findAll()
 * @method Reponsee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reponsee::class);
    }

//    /**
//     * @return Reponsee[] Returns an array of Reponsee objects
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

//    public function findOneBySomeField($value): ?Reponsee
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
