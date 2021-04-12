<?php

namespace App\Controller;

use App\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        //$jobs = $entityManager->getRepository(Job::class)->findAll();


       

        return $this->render('job.html.twig', [
            'formulaireJob'   => $formulaireJob->createView(),
            'controller_name' => 'JobController',
            'jobs' => $jobs
        ]);
    }

    
    /**
     * @Route("/api/job", name="apijob")
     */
    public function fetchJob(HttpFoundationRequest $request, EntityManagerInterface $entityManager): Response
    {
        $jobs = $entityManager->getRepository(Job::class)->findBy([],['name'=>'DESC']);

        $content = $request->getContent();
        $jsonParameters = json_decode($content, true);
        // On vérifie ici si on a des paramètres de recherche ou non, et sinon on fait le tri.
        $hasParameters = isset($jsonParameters['search']) && $jsonParameters['search'];

        if ($hasParameters) {
            //for loop 
            $search = $jsonParameters['search'];

            $results = array_filter(
                $jobs,
                static function ($job) use ($search) {
                   
                
                    return str_contains($job, $search);
                });
        }
        else {
            $results = $jobs;
        }

        return new JsonResponse([
            'data'          => $results,
            'hasParameters' => $hasParameters
            
            ]);

    }
}
