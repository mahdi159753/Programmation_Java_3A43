<?php

namespace App\Repository;

use App\Entity\Discussio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Discussio>
 *
 * @method Discussio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Discussio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Discussio[]    findAll()
 * @method Discussio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscussioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Discussio::class);
    }

//    /**
//     * @return Discussio[] Returns an array of Discussio objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Discussio
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
