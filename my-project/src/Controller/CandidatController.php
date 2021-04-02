<?php

namespace App\Controller;

use App\Entity\Document;
use App\Entity\CandidatProfil;
use App\Form\DocumentType;
use App\Form\CandidatProfilType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidatController extends AbstractController
{
    
    // /**
    //  * @Route("/candidat", name="candidat")
    //  */
    // public function index(Request $request): Response
    // {   
    //     $formulaire = $this->createForm(DocumentType::class)->handleRequest($request);

    //     return $this->render('candidat.html.twig', [
    //         'controller_name' => 'CandidatController',
    //         'formulaire' => $formulaire->createView()
            
    //     ]);
    // }
        /**
     * @Route("/candidat", name="candidat")
     */
    public function profil(Request $request): Response
    {   
        $formulaire2 = $this->createForm(CandidatProfilType::class)->handleRequest($request);

        return $this->render('candidat.html.twig', [
            'controller_name' => 'CandidatController',
            'formulaire2' => $formulaire2->createView()
            
        ]);
    }
}
