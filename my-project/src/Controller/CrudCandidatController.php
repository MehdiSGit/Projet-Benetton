<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/crud/candidat')]
class CrudCandidatController extends AbstractController
{
    #[Route('/', name: 'crud_candidat_index', methods: ['GET'])]
    public function index(CandidatRepository $candidatRepository): Response
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
    public function edit(Request $request): Response
    {
        $candidat = $this->getUser();
        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('crud_candidat_index');
        }

        return $this->render('crud_candidat/edit.html.twig', [
            'candidat' => $candidat,
            'form' => $form->createView(),
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
