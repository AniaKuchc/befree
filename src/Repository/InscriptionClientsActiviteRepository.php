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

    // public function activityInscription(int $clientId, int $activiteId)
    // {
    //     $query = $this->createQueryBuilder('insc')
    //         ->insert('inscription_clients_activite')
    //         ->values(
    //             [
    //                 'clients' => ':cli',
    //                 'activites' => ':act',
    //             ]
    //         )
    //         ->setParameter('cli', $clientId)
    //         ->setParameter('act', $activiteId)
    //         ->execute();
    // }

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
