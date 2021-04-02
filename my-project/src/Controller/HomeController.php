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

        // On vérifie si le formulaire est soumis ET s'il est valide
        if ($formulaire->isSubmitted() && $formulaire->isValid()){
            // $formulaire->getData() permet de récupérer l'objet Document (cf. Entity\Document.php)
            $document = $formulaire->getData();
            $document->setCandidat($this->getUser());
            
            // $entityManager = Doctrine = BDD
            // Informe doctrine qu'un nouveau document doit être inséré en BDD (PDO = prepare)
            $entityManager->persist($document);

            // flush correspond à la fonction execute de PDO
            $entityManager->flush();

            // Création d'un message "flash" afin d'informer l'utilisateur
            $this->addFlash('message_success', 'Votre image a bien été ajoutée');

            // Redirection sur la page d'accueil en GET
            return $this->redirectToRoute('home');
        }

        return $this->render('candidat.html.twig', [
            'controller_name' => 'CandidatController',
            'formulaire' => $formulaire->createView()
            
        ]);
    }
    
}
