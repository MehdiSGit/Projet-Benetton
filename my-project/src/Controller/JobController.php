<?php

namespace App\Controller;

use App\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\JobType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class JobController extends AbstractController
{
    

    /**
     * @Route("/job", name="job")
     */
    public function index(HttpFoundationRequest $request, EntityManagerInterface $entityManager): Response
    {
        $formulaireJob = $this->createForm(JobType::class);
        $jobs = $entityManager->getRepository(Job::class)->findBy([],['name'=>'DESC']);



        return $this->render('job.html.twig', [
            'formulaireJob'   => $formulaireJob->createView(),
            'controller_name' => 'JobController',
            'jobs' => $jobs
        ]);
    }
}
