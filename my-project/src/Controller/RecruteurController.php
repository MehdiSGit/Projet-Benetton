<?php

namespace App\Controller;

use App\Form\RecruteurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/** 
 *@IsGranted("ROLE_RECRUTEUR")
 */
class RecruteurController extends AbstractController
{
    /**
     * @Route("/recruteur", name="recruteur")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $recruteur = $this->getUser();
        // dd($recruteur);
        $formulaire3 = $this->createForm(RecruteurType::class)->handleRequest($request);

        if ($formulaire3->isSubmitted() && $formulaire3->isValid()){
            // $formulaire3->getData() permet de récupérer l'objet Document (cf. Entity\Document.php)
        
            // $entityManager = Doctrine = BDD
            // Informe doctrine qu'un nouveau recruteur doit être inséré en BDD (PDO = prepare)
            $entityManager->persist($recruteur);

            // flush correspond à la fonction execute de PDO
            $entityManager->flush();

            // Création d'un message "flash" afin d'informer l'utilisateur
            $this->addFlash('message_success', 'Vos informations ont été mises à jour');

            // Redirection sur la page d'accueil en GET
            return $this->redirectToRoute('recruteur');
        }

        return $this->render('recruteur/recruteur.html.twig', [
            'controller_name' => 'RecruteurController',
            'formulaire3' => $formulaire3->createView()
        ]);
    }
}
