<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PurchaseOrder;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProgrammingLanguageRepository;

    /**
     * @Route("/detail", name="test_detail", methods="GET")
     */

class TestController extends AbstractController
{

    
    /**
     * @Route("/list", name="test_list", methods="GET")
     */
    public function list(ProgrammingLanguageRepository $programmingLanguageRepository): Response
    {
        return $this->render('test/detail.html.twig', [
        'programmingLanguages' => $programmingLanguageRepository->findAll()
        ]);
    }
    
    /**
     * @Route("/known", name="test_known", methods="GET")
     */
    public function known(ProgrammingLanguageRepository $programmingLanguageRepository): Response
    {
        return $this->render('test/known.html.twig', [
        'programmingLanguages' => $programmingLanguageRepository->findKnown()
        ]);
    }
    /**
     * @Route("/{id}", name="test_detail", methods="GET")
     */
    public function detail(PurchaseOrder $purchaseOrder): Response
    {
        return $this->render('test/detail.html.twig', [
        'purchaseOrder' => $purchaseOrder
        ]);
    }
}
