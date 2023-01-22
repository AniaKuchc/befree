<?php

namespace App\Repository;

use App\Entity\SouscriptionClientOffre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SouscriptionClientOffre>
 *
 * @method SouscriptionClientOffre|null find($id, $lockMode = null, $lockVersion = null)
 * @method SouscriptionClientOffre|null findOneBy(array $criteria, array $orderBy = null)
 * @method SouscriptionClientOffre[]    findAll()
 * @method SouscriptionClientOffre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SouscriptionClientOffreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SouscriptionClientOffre::class);
    }

    public function save(SouscriptionClientOffre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SouscriptionClientOffre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Return offer for one client
     *
     * @param integer $activiteId
     * @param integer $clientId
     * @return SouscriptionClientOffre|null
     */
    public function findOfferForOneClient(int $client): ?SouscriptionClientOffre
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.clients = :cli')
            ->setParameter('cli', $client)
            ->getQuery()
            ->getOneOrNullResult();
    }

    //    public function findOneBySomeField($value): ?SouscriptionClientOffre
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
