<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CashController extends AbstractController
{
    /**
     * @Route("/cash", name="cash")
     */
    public function index(): Response
    {
        return $this->render('cash/index.html.twig', [
            'controller_name' => 'CashController',
        ]);
    }
}
