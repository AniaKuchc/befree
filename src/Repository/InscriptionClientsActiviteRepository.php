<?php

namespace App\Repository;

use App\Entity\InscriptionClientsActivite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InscriptionClientsActivite>
 *
 * @method InscriptionClientsActivite|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionClientsActivite|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionClientsActivite[]    findAll()
 * @method InscriptionClientsActivite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionClientsActiviteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionClientsActivite::class);
    }

    public function save(InscriptionClientsActivite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(InscriptionClientsActivite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findOneById(int $activiteId, int $clientId): ?InscriptionClientsActivite
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.activites = :act')
            ->andWhere('i.clients = :cli')
            ->setParameter('act', $activiteId)
            ->setParameter('cli', $clientId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Return an array of Client inscription into activite
     *
     * @param integer $client
     * @return array
     */
    public function findActivityPerClient(int $clientId): ?array
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.clients = :cli')
            ->setParameter('cli', $clientId)
            ->getQuery()
            ->getResult();
    }


    //    /**
    //     * @return InscriptionClientsActivite[] Returns an array of InscriptionClientsActivite objects
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

    //    public function findOneBySomeField($value): ?InscriptionClientsActivite
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
