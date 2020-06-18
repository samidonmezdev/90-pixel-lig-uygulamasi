<?php

namespace App\Repository;

use App\Entity\Takimlar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Takimlar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Takimlar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Takimlar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TakimlarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Takimlar::class);
    }

    // /**
    //  * @return Takimlar[] Returns an array of Takimlar objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */


    public function findAll()
    {
        return $this->findBy(array(), array('puan' => 'DESC',"averaj"=>"DESC"));
    }



    public function addTakim($value)
    {
        $entityManager = $this->getEntityManager();
        $repository = $entityManager->getRepository(Takimlar::class);
        $takimsayi = $repository->findAll();
        if (count($takimsayi) < 18) {
            $takim = $repository->findOneBy(array('ad' => $value));
            if ($takim == null) {
                $takim = new Takimlar();
                $takim->setAd($value);
                $entityManager->persist($takim);
                $entityManager->flush();
                return "başarıyla eklendi";
            } else {
                return "bu ada sahip bir takım var";
            }
        } else {
            return "18 takım sınırı doldu ekleme yapamazsınız";
        }
        return "ok";
    }
}