<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\JobType;

class JobController extends AbstractController
{
    

    /**
     * @Route("/job", name="job")
     */
    public function index(): Response
    {
        $formulaireJob = $this->createForm(JobType::class);



        return $this->render('job.html.twig', [
            'formulaireJob'   => $formulaireJob->createView(),
            'controller_name' => 'JobController',
        ]);
    }
}
