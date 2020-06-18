<?php

namespace App\Controller;


use App\Entity\Maclar;
use App\Entity\Takimlar;
use App\Service\fiksturOlusturucu;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FiksturController extends AbstractController
{

    /**
     * @Route("/olustur", name="fiksturolustur")
     */
    public function olustur(fiksturOlusturucu $fiksturOlusturucu)
    {
        $takimlar=$this->getDoctrine()->getRepository(Takimlar::class)->findAll();
        $maclar=$fiksturOlusturucu->fiksturOLustur($takimlar);
        $this->getDoctrine()->getRepository(Maclar::class)->addFikstur($maclar);
        return $this->render('fikstur/dene.html.twig', [
            'controller_name' => 'FiksturController',
            "maclar"=>$maclar
        ]);

    }
    /**
     * @Route("/oyna/{id}", name="macoyna")
     */
    public function oyna(int $id)
    {
        $em=$this->getDoctrine()->getManager();
        $maçlar=$this->getDoctrine()->getRepository(Maclar::class)->findByHafta($id);

        for ($i=0;$i<count($maçlar);$i++) {
            $mac = $maçlar[$i];
            $t1gol = rand(0, 5);
            $t2gol = rand(0, 5);
            $takim1 = $mac->getTakim1();
            $takim2 = $mac->getTakim2();
            $mac->setT1gol($t1gol);
            $mac->setT2gol($t2gol);
            $takim1->setAtilangol($takim1->getAtilangol() + $t1gol);
            $takim1->setYenilengol($takim1->getYenilengol() + $t2gol);
            $takim2->setAtilangol($takim2->getAtilangol() + $t2gol);
            $takim2->setYenilengol($takim2->getYenilengol() + $t1gol);
            if ($t1gol == $t2gol) {
                $takim1->setBeraberlik($takim1->getBeraberlik() + 1);
                $takim2->setBeraberlik($takim2->getBeraberlik() + 1);
                $takim1->setPuan($takim1->getPuan()+1);
                $takim2->setPuan($takim2->getPuan()+1);
            } elseif ($t1gol > $t2gol) {
                $takim1->setGalibiyet($takim1->getGalibiyet() + 1);
                $takim2->setMaglubiyet($takim2->getMaglubiyet() + 1);
                $takim1->setPuan($takim1->getPuan()+3);
            } else {
                $takim2->setGalibiyet($takim1->getGalibiyet() + 1);
                $takim1->setMaglubiyet($takim2->getMaglubiyet() + 1);
                $takim2->setPuan($takim2->getPuan()+3);
            }
            $takim1->setHafta($takim1->getHafta() + 1);
            $takim1->setHafta($takim1->getHafta() + 1);
            $takim1->SetAveraj($takim1->getAveraj()+($t1gol-$t2gol));
            $takim2->SetAveraj($takim2->getAveraj()+($t2gol-$t1gol));
            $em->persist($takim1);
            $em->persist($takim2);
            $em->persist($mac);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('takim'));

    }

}
