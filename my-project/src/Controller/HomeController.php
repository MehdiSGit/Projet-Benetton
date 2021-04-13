<?php

namespace App\Controller;

use App\Form\DocumentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Création du formulaire d'upload d'image pour le candidat
        $formulaire = $this->createForm(DocumentType::class)->handleRequest($request);

        return $this->render('home/home.html.twig', [
            'controller_name' => 'CandidatController',
            'formulaire' => $formulaire->createView()
            
        ]);
    }

    // /**
    //  * @Route("/{reactRouting}", name="homepage", defaults={"reactRouting": null})
    //  */
    // public function base(): Response
    // {
    //     return $this->render('base.html.twig');
    // }
    
}
