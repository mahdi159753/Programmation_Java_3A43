<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexbackController extends AbstractController
{

    #[Route('/indexback', name: 'app_indexback')]
    public function index(): Response
    {
        return $this->render('indexback/indexback.html.twig', [
            'controller_name' => 'IndexbackController',
        ]);
    }
   
}
