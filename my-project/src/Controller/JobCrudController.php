<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\JobPostuler;
use App\Form\Job1Type;
use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/offres/modifier")
 */
class JobCrudController extends AbstractController
{
    /**
     * @Route("/", name="job_crud_index", methods={"GET"})
     */
    public function index(): Response
    {
        $recruteur = $this->getUser();
        return $this->render('job_crud/index.html.twig', [
            'jobs' => $recruteur->getJobs(),
        ]);
    }

    /**
     * @Route("/new", name="job_crud_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $recruteur = $this->getUser();
        $job = new Job();
        $job->setRecruteurId($recruteur);
        $form = $this->createForm(Job1Type::class, $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($job);
            $entityManager->flush();

            return $this->redirectToRoute('job_crud_index');
        }

        return $this->render('job_crud/new.html.twig', [
            'job' => $job,
            'form' => $form->createView(),
        ]);
        
    }

    /**
     * @Route("/{id}", name="job_crud_show", methods={"GET"})
     */
    public function show(Job $job): Response
    {
        return $this->render('job_crud/show.html.twig', [
            'job' => $job,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="job_crud_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Job $job): Response
    {
        $recruteur = $this->getUser();
        $job->setRecruteurId($recruteur);
        $form = $this->createForm(Job1Type::class, $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('job_crud_index');
        }

        return $this->render('job_crud/edit.html.twig', [
            'job' => $job,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="job_crud_delete", methods={"POST"})
     */
    public function delete(Request $request, Job $job): Response
    {
        if ($this->isCsrfTokenValid('delete'.$job->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($job);
            $entityManager->flush();
        }

        return $this->redirectToRoute('job_crud_index');
    }
}
