<?php

namespace App\Repository;

use App\Entity\Activities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use DateTimeZone;

/**
 * @extends ServiceEntityRepository<Activities>
 *
 * @method Activities|null find($id, $lockMode = null, $lockVersion = null)
 * @method Activities|null findOneBy(array $criteria, array $orderBy = null)
 * @method Activities[]    findAll()
 * @method Activities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

date_default_timezone_set('Asia/Ho_Chi_Minh');
class ActivitiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Activities::class);
    }

    public function save(Activities $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Activities $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    //SELECT c.club_name, a.score, a.image, a.start_date, a.start_time, a.end_time, a.name FROM activities a, clubs c WHERE a.club_id = c.id; 

    /**
    * @return Activities[] Returns an array of Activities objects
    */
    public function findActivitiesWithClubName(): array
    {
        return $this->createQueryBuilder('a')
            ->select('c.clubName, a.Score, a.Image, a.StartDate, a.StartTime, a.EndTime, a.Name, a.id')
            ->innerJoin('a.club', 'c')
            ->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getArrayResult()
        ;
    }



//    /**
//     * @return Activities[] Returns an array of Activities objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Activities
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
