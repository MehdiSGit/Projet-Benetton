<?php

namespace App\Controller;

use App\Entity\Recruteur;
use App\Form\Recruteur1Type;
use App\Repository\RecruteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/recruteur')]
class CrudRecruteurController extends AbstractController
{
    #[Route('/', name: 'crud_recruteur_index', methods: ['GET'])]
    public function index(RecruteurRepository $recruteurRepository): Response
    {
        $recruteur = $this->getUser();

        return $this->render('crud_recruteur/index.html.twig', [
            'recruteur' => $recruteur
        ]);
    }

    #[Route('/new', name: 'crud_recruteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
       

        $recruteur = new Recruteur();
        $form = $this->createForm(Recruteur1Type::class, $recruteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recruteur);
            $entityManager->flush();

            return $this->redirectToRoute('crud_recruteur_index');
        }

        return $this->render('crud_recruteur/new.html.twig', [
            'recruteur' => $recruteur,
            'form' => $form->createView(),
        ]);
    }

    // #[Route('/{id}', name: 'crud_recruteur_show', methods: ['GET'])]
    // public function show(Recruteur $recruteur): Response
    // {
    //     return $this->render('crud_recruteur/show.html.twig', [
    //         'recruteur' => $recruteur,
    //     ]);
    // }

    #[Route('/edit', name: 'crud_recruteur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request): Response
    {
        $recruteur = $this->getUser();

        $form = $this->createForm(Recruteur1Type::class, $recruteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('crud_recruteur_index');
        }

        return $this->render('crud_recruteur/edit.html.twig', [
            'recruteur' => $recruteur,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'crud_recruteur_delete', methods: ['POST'])]
    public function delete(Request $request, Recruteur $recruteur): Response
    {
        $recruteur = $this->getUser();

        if ($this->isCsrfTokenValid('delete'.$recruteur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recruteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('crud_recruteur_index');
    }
}
