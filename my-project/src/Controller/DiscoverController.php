<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiscoverController extends AbstractController
{
    
    /**
     * @Route("/lesoffres", name="")
     */
    public function index(): Response
    {
        return $this->render('discover.html.twig', [
            'controller_name' => 'DiscoverController',
        ]);
    }
}
