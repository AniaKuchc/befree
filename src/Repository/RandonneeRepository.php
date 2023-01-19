<?php

namespace App\Repository;

use App\Entity\Randonnee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Randonnee>
 *
 * @method Randonnee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Randonnee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Randonnee[]    findAll()
 * @method Randonnee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RandonneeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Randonnee::class);
    }

    public function save(Randonnee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Randonnee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Randonnee[] Returns an array of Randonnee objects
     */
    public function findInCatalogue(): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.catalogueRandonnees IS NOT NULL')
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?Randonnee
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
