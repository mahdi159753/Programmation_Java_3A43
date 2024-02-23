<?php

namespace App\Repository;

use App\Entity\Discussion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Utilisateur;


/**
 * @extends ServiceEntityRepository<Discussion>
 *
 * @method Discussion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Discussion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Discussion[]    findAll()
 * @method Discussion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscussionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Discussion::class);
    }

    public function save(Discussion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Discussion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
   
    public function modifierTitreDiscussion($idDiscussion, $nouveauTitre)
{
    $entityManager = $this->getEntityManager();

    $discussion = $this->find($idDiscussion);

    if (!$discussion) {
        throw $this->createNotFoundException(
            'Aucune discussion trouvée pour l\'ID '.$idDiscussion
        );
    }

    $discussion->setTitreDiscussion($nouveauTitre);

    $entityManager->flush();

    return $discussion;
}

public function modifierContenuDiscussion($idDiscussion, $nouveauContenu)
{
    $entityManager = $this->getEntityManager();

    $discussion = $this->find($idDiscussion);

    if (!$discussion) {
        throw $this->createNotFoundException(
            'Aucune discussion trouvée pour l\'ID '.$idDiscussion
        );
    }

    $discussion->setContenuDiscussion($nouveauContenu);

    $entityManager->flush();

    return $discussion;
}
public function supprimerDiscussion(int $id): void
{
    $entityManager = $this->getEntityManager();
    $discussion = $this->findOneBy(['idDiscussion' => $id]);

    if ($discussion !== null) {
        $entityManager->remove($discussion);
        $entityManager->flush();
    }
}
public function findAll():array
{
    return $this->createQueryBuilder('d')
        ->orderBy('d.dateDiscussion', 'DESC')
        ->getQuery()
        ->getResult();
}
public function findByUser($firstname, $lastname) :array
{
    if (empty($firstname) || empty($lastname)) {
        return [];
    }
    
    //$user = $this->_em->getRepository(User::class)->findOneBy([
      //   'prenomUser' => $firstname,
        // 'nomUser' => $lastname,
     //]);
    // if (!$user) {
      //   throw new \Exception('Utilisateur non trouvé.');
   //  }
    $queryBuilder = $this->createQueryBuilder('d')
        ->select('d.idDiscussion', 'd.titreDiscussion', 'd.contenuDiscussion', 'd.dateDiscussion')
        ->orderBy('d.dateDiscussion', 'DESC')
        ->join('d.idUser', 'u')
        ->where('u.prenomUser = :firstname')
        ->andWhere('u.nomUser = :lastname')
        ->setParameter('firstname', $firstname)
        ->setParameter('lastname', $lastname);
      
    
    $discussions = $queryBuilder->getQuery()->getResult();
    
    if (empty($discussions)) {
        throw new \Exception('Aucune discussion trouvée pour cet utilisateur.');
    }
    
    return $discussions;
}
public function findByTitleOrContent($searchTerm)
{
    $queryBuilder = $this->createQueryBuilder('d')
        ->where('d.titreDiscussion LIKE :searchTerm')
        ->orWhere('d.contenuDiscussion LIKE :searchTerm')
        ->setParameter('searchTerm', '%'.$searchTerm.'%')
        ->orderBy('d.dateDiscussion', 'DESC')
        ->getQuery();
    
    $discussions = $queryBuilder->getResult();
    $finalDiscussions = array();
    
    foreach ($discussions as $discussion) {
        $strippedContent = strip_tags($discussion->getContenuDiscussion());
        if (strpos($discussion->getTitreDiscussion(), $searchTerm) !== false || strpos($strippedContent, $searchTerm) !== false) {
            $finalDiscussions[] = $discussion;
        }
    }

    return $finalDiscussions;
}



public function findDiscussionsBetweenDates(\DateTime $date1, \DateTime $date2)
{
    if ($date1 > $date2) {
        // échanger les dates pour qu'on ait la date la plus ancienne en premier
        $temp = $date1;
        $date1 = $date2;
        $date2 = $temp;
    }

    return $this->createQueryBuilder('d')
        ->where('d.dateDiscussion BETWEEN :date1 AND :date2')
        ->setParameter('date1', $date1)
        ->setParameter('date2', $date2)
        ->orderBy('d.dateDiscussion', 'DESC')
        ->getQuery()
        ->getResult();
}

public function findUserNameByDiscussionId(int $discussionId): ?string
{
    $qb = $this->createQueryBuilder('d')
        ->select('CONCAT(u.nomUser, \' \', u.prenomUser) as userName')
        ->join('d.idUser', 'u')
        ->where('d.idDiscussion = :discussionId')
        ->setParameter('discussionId', $discussionId);

    return $qb->getQuery()->getOneOrNullResult()['userName'];
}

//    /**
//     * @return Discussion[] Returns an array of Discussion objects
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

//    public function findOneBySomeField($value): ?Discussion
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
