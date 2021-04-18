<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Document;
use App\Form\CandidatProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/candidat')]
class CrudCandidatController extends AbstractController
{
    #[Route('/', name: 'crud_candidat_index', methods: ['GET'])]
    public function index(): Response
    {
        $candidat = $this->getUser();
        
        return $this->render('crud_candidat/index.html.twig', [
            'candidat' => $candidat
        ]);
    }

    #[Route('/new', name: 'crud_candidat_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $candidat = new Candidat();
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($candidat);
            $entityManager->flush();

            return $this->redirectToRoute('crud_candidat_index');
        }

        return $this->render('crud_candidat/new.html.twig', [
            'candidat' => $candidat,
            'form' => $form->createView(),
        ]);
    }

    // #[Route('/{id}', name: 'crud_candidat_show', methods: ['GET'])]
    // public function show(Candidat $candidat): Response
    // {
    //     return $this->render('crud_candidat/show.html.twig', [
    //         'candidat' => $candidat,
    //     ]);
    // }

    #[Route('/edit', name: 'crud_candidat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request,EntityManagerInterface $entityManager): Response
    {
        $candidat = $this->getUser();
        
        
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
            return $this->redirectToRoute('crud_candidat_index');
        }
        return $this->render('crud_candidat/edit.html.twig', [
            'candidat' => $candidat,
            'form' => $formulaire2->createView(),
        ]);
    }

    #[Route('/{id}', name: 'crud_candidat_delete', methods: ['POST'])]
    public function delete(Request $request, Candidat $candidat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($candidat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('crud_candidat_index');
    }
}
