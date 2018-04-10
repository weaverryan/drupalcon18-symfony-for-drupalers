<?php

namespace App\Repository;

use App\Entity\CountrySong;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CountrySong|null find($id, $lockMode = null, $lockVersion = null)
 * @method CountrySong|null findOneBy(array $criteria, array $orderBy = null)
 * @method CountrySong[]    findAll()
 * @method CountrySong[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountrySongRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CountrySong::class);
    }

//    /**
//     * @return CountrySong[] Returns an array of CountrySong objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CountrySong
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
