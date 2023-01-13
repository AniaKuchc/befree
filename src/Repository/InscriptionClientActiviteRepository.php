<?php

namespace App\Repository;

use App\Entity\InscriptionClientActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InscriptionClientActivite>
 *
 * @method InscriptionClientActivite|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionClientActivite|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionClientActivite[]    findAll()
 * @method InscriptionClientActivite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionClientActiviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionClientActivite::class);
    }

    public function save(InscriptionClientActivite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(InscriptionClientActivite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return InscriptionClientActivite[] Returns an array of InscriptionClientActivite objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?InscriptionClientActivite
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
