<?php

namespace App\Repository;

use App\Entity\Movil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Movil>
 *
 * @method Movil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movil[]    findAll()
 * @method Movil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movil::class);
    }

//    /**
//     * @return Movil[] Returns an array of Movil objects
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

//    public function findOneBySomeField($value): ?Movil
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
