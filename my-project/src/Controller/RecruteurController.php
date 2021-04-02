<?php

namespace App\Controller;

use App\Form\RecruteurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecruteurController extends AbstractController
{
    /**
     * @Route("/recruteur", name="recruteur")
     */
    public function index(Request $request): Response
    {
        $formulaire3 = $this->createForm(RecruteurType::class)->handleRequest($request);

        return $this->render('recruteur.html.twig', [
            'controller_name' => 'RecruteurController',
            'formulaire3' => $formulaire3->createView()
        ]);
    }
}
