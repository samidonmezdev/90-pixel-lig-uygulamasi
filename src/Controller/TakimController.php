<?php

namespace App\Controller;


use App\Entity\Maclar;
use App\Entity\Takimlar;
use App\Form\TakimType;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TakimController extends AbstractController
{
    /**
     * @Route("/", name="takim_index")
     */
    public function index()
    {
        $takimlar= $this->getDoctrine()->getRepository(Takimlar::class)->findAll();
        $maclar= $this->getDoctrine()->getRepository(Maclar::class)->findAll();

        return $this->render('takim/index.html.twig', [
            'controller_name' => 'TakimController',
            'takimlar'=>$takimlar,
            "maclar"=>$maclar,
            "bas"=>0
        ]);
    }
    /**
     * @Route("/ekle", name="takim")
     */
    public function ekleIndex()
    {
        $takim = new Takimlar();
        $form = $this->createForm(TakimType::class, $takim);
        return $this->render('takim/ekle.html.twig', [
            'controller_name' => 'TakimController',
            'form'=>$form->createView(),
            'action' => "/takim/add",
            'method' => 'POST'
        ]);
    }
    /**
     * @Route("/add", name="takim_add", methods={"POST"})
     */
    public function ekle(Request $request)
    {
       $ad=$request->request->get('takim')["ad"];
        $sonuc =   $this->getDoctrine()->getRepository(Takimlar::class)->addTakim($ad);

        return $this->render("takim/sonuc.html.twig",["sonuc"=>$sonuc]) ;
    }
}
