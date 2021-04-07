<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestReactController extends AbstractController
{
    /**
     * @Route("/testReact", name="testReact")
     */
    public function index(): Response
    {
        return $this->render('testReact.html.twig', [
            'controller_name' => 'TestReactController',
        ]);
    }
}
