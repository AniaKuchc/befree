<?php

namespace App\Repository;

use App\Entity\CatalogueRandonnee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CatalogueRandonnee>
 *
 * @method CatalogueRandonnee|null find($id, $lockMode = null, $lockVersion = null)
 * @method CatalogueRandonnee|null findOneBy(array $criteria, array $orderBy = null)
 * @method CatalogueRandonnee[]    findAll()
 * @method CatalogueRandonnee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatalogueRandonneeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CatalogueRandonnee::class);
    }

    public function save(CatalogueRandonnee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CatalogueRandonnee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CatalogueRandonnee[] Returns an array of CatalogueRandonnee objects
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

//    public function findOneBySomeField($value): ?CatalogueRandonnee
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
