<?php

namespace App\Repository;

use App\Entity\SoucriptionClientOffre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SoucriptionClientOffre>
 *
 * @method SoucriptionClientOffre|null find($id, $lockMode = null, $lockVersion = null)
 * @method SoucriptionClientOffre|null findOneBy(array $criteria, array $orderBy = null)
 * @method SoucriptionClientOffre[]    findAll()
 * @method SoucriptionClientOffre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SoucriptionClientOffreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SoucriptionClientOffre::class);
    }

    public function save(SoucriptionClientOffre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SoucriptionClientOffre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SoucriptionClientOffre[] Returns an array of SoucriptionClientOffre objects
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

//    public function findOneBySomeField($value): ?SoucriptionClientOffre
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
