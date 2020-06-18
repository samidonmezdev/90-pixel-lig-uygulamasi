<?php

namespace App\Repository;

use App\Entity\Maclar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Maclar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maclar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maclar[]    findAll()
 * @method Maclar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaclarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Maclar::class);
    }

    // /**
    //  * @return Maclar[] Returns an array of Maclar objects
    //  */

    public function findByHafta($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.hafta = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(9)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Maclar
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function addFikstur(array $array)
    {
        $em = $this->getEntityManager();
        foreach ($array as $item){
            $fikstur = new Maclar();
            $fikstur->setTakim2($item[1]);
            $fikstur->setTakim1($item[0]);
            $fikstur->setHafta($item[2]);
            $fikstur->setT1gol(-1);
            $fikstur->setT2gol(-1);
            $em->persist($fikstur);
            $em->flush();
        }
    }
}
