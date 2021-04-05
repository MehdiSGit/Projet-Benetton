<?php

namespace App\Controller;

use App\Entity\Document;
use App\Entity\CandidatProfil;
use App\Form\DocumentType;
use App\Form\CandidatProfilType;
use Doctrine\ORM\EntityManagerInterface;
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
    public function profil(Request $request, EntityManagerInterface $entityManager): Response
    {   
        // TODO : Cette page est accessible UNIQUEMENT si on est connecté ET qu'on est un candidat
        // $this->getUser() récupère l'utilisateur connecté
        /** Candidat $candidat */
        $candidat = $this->getUser();
        // dd($candidat->getDocuments()[0]);
        
        // Si les documents n'existent pas, je les initialisent pour la première fois
        if ($candidat->getDocuments()->count() < 3) {
            $candidat->addDocument((new Document())->setName('photo'));
            $candidat->addDocument((new Document())->setName('cv'));
            $candidat->addDocument((new Document())->setName('lettre de motivation'));
        }

        $formulaire2 = $this->createForm(CandidatProfilType::class, $candidat)->handleRequest($request);

        if ($formulaire2->isSubmitted() && $formulaire2->isValid()){
            // $formulaire2->getData() permet de récupérer l'objet Document (cf. Entity\Document.php)

            $formulaire2->getData();
        
            // $entityManager = Doctrine = BDD
            // Informe doctrine qu'un nouveau candidat doit être inséré en BDD (PDO = prepare)
            $entityManager->persist($candidat);

            // flush correspond à la fonction execute de PDO
            $entityManager->flush();

            // Création d'un message "flash" afin d'informer l'utilisateur
            $this->addFlash('message_success', 'Vos informations ont été mises à jour');

            // Redirection sur la page d'accueil en GET
            return $this->redirectToRoute('candidat');
        }

        return $this->render('candidat/candidat.html.twig', [
            'candidat' => $candidat,
            'formulaire2' => $formulaire2->createView()
        ]);
    }
}
