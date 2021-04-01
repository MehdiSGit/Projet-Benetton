<?php

namespace App\Controller;

use App\Form\DocumentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidatController extends AbstractController
{
    /**
     * @Route("/candidat", name="candidat")
     */
    public function index(Request $request): Response
    {   
        $formulaire = $this->createForm(DocumentType::class)->handleRequest($request);

        return $this->render('home.html.twig', [
            'controller_name' => 'CandidatController',
            'formulaire' => $formulaire->createView()
            
        ]);
    }
}
