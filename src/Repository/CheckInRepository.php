<?php

namespace App\Repository;

use App\Entity\CheckIn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CheckIn>
 *
 * @method CheckIn|null find($id, $lockMode = null, $lockVersion = null)
 * @method CheckIn|null findOneBy(array $criteria, array $orderBy = null)
 * @method CheckIn[]    findAll()
 * @method CheckIn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CheckInRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CheckIn::class);
    }

    public function save(CheckIn $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CheckIn $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    //SELECT ac.name, ac.start_date, ac.start_time, ac.end_time, a.studen_id, a.studen_name FROM check_in c, account a, activities ac WHERE c.activities_id=ac.id and c.account_id=a.id; 


    /**
    * @return CheckIn[] Returns an array of CheckIn objects
    */
    public function showCheckInPage(): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.id, ac.Name, ac.StartDate, ac.StartTime, ac.EndTime, ac.Score, a.studenId, a.studenName')
            ->innerJoin('c.activities', 'ac')
            ->innerJoin('c.account', 'a')
            ->getQuery()
            ->getArrayResult()
        ;
    }



    /**
    * @return CheckIn[] Returns an array of CheckIn objects
    */
    public function showCheckInPageByEmail($email): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.id, ac.Name, ac.StartDate, ac.StartTime, ac.EndTime, ac.Score, a.studenId, a.studenName')
            ->innerJoin('c.activities', 'ac')
            ->innerJoin('c.account', 'a')
            ->andWhere('a.email = :val')
            ->setParameter('val', $email)
            ->getQuery()
            ->getArrayResult()
        ;
    }



    //SELECT SUM(ac.score) as "Total Score", a.studen_id, a.studen_name FROM check_in c, account a, activities ac WHERE c.activities_id=ac.id and c.account_id=a.id GROUP BY a.studen_id, a.studen_name; 

    /**
    * @return CheckIn[] Returns an array of CheckIn objects
    */
    public function showScorePage(): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.id, SUM(ac.Score) as totalScore, a.studenId, a.studenName')
            ->innerJoin('c.activities', 'ac')
            ->innerJoin('c.account', 'a')
            ->groupBy('a.studenId')
            ->groupBy(' a.studenName')
            ->getQuery()
            ->getArrayResult()
        ;
    }



    //SELECT SUM(ac.score) as "Total Score", a.studen_id, a.studen_name FROM check_in c, account a, activities ac WHERE c.activities_id=ac.id and c.account_id=a.id and a.email ="PhucAdmin@gmail.com" GROUP BY a.studen_id, a.studen_name; 

    /**
    * @return CheckIn[] Returns an array of CheckIn objects
    */
    public function showScorePageByEmail($email): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.id, SUM(ac.Score) as totalScore, a.studenId, a.studenName')
            ->innerJoin('c.activities', 'ac')
            ->innerJoin('c.account', 'a')
            ->andWhere('a.email = :val')
            ->setParameter('val', $email)
            ->groupBy('a.studenId')
            ->groupBy(' a.studenName')
            ->getQuery()
            ->getArrayResult()
        ;
    }


//    /**
//     * @return CheckIn[] Returns an array of CheckIn objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CheckIn
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
