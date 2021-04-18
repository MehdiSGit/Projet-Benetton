<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\Candidat;
use App\Entity\JobPostuler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\JobType;
use App\Repository\JobPostulerRepository;
use App\Repository\JobRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class JobController extends AbstractController
{
    

    /**
     * @Route("/offres", name="offres")
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
        $jobs = $entityManager->getRepository(Job::class)->findAll();
        $data = [];
        
        $content = $request->getContent();
        $jsonParameters = json_decode($content, true);
        // On vérifie ici si on a des paramètres de recherche ou non, et sinon on fait le tri.
        $hasParameters = isset($jsonParameters['search']) && $jsonParameters['search'];

        if ($hasParameters) {
            //for loop 
            $search = $jsonParameters['search'];

            $results = array_filter(
                $jobs,
                static function (Job $job) use ($search) {
                    return str_contains(strtolower($job->getDescription()), strtolower($search)) || str_contains(strtolower($job->getName()), strtolower($search)) ;
                });
        }
        else {
            $results = $data;
        }
        foreach($results as $job){
            $data[] = $job->formatedForView();
        };
        return new JsonResponse([
            'data'       => $data,
            'paramaters' => $jsonParameters,
            'hasParameters' => $hasParameters
        ]);
    }

    /**
     * @Route("/showJob/{id}", name="displayJob")
     */
    public function displayJob(EntityManagerInterface $entityManager,HttpFoundationRequest $request, $id){

        //chercher id dans l'url
        
        // fetch le job avec id
        $job = $entityManager->getRepository(Job::class)->findOneBy(['id'=>$id]);
        
       
        return $this->render('displayJob.html.twig',[
            'job'   => $job,
            
        ]);
    }

     // FUNCTION Postulez /////////////////////////////

     /**
      * Permet de postuler une annonce
      *@Route("/postulers/{id}", name="job_postuler")
      *   
      */
    public function postuler(Job $job,EntityManagerInterface $entityManager,JobPostulerRepository $jobPostulerRepository): 
    Response {
        ///
        $candidat = $this->getUser();

        if(!$candidat){

            // PERMET L'UTILISATEUR QUI A PAS DE COMPTE, A ENVOYER SON CV PAR MAIL
            //return $this->redirectToRoute('') ;
        }
        

        $postuler = new JobPostuler();
        $postuler
            ->setJob($job)
            ->setCandidat($candidat);

        $entityManager->persist($postuler);
        $entityManager->flush();

        return $this->redirectToRoute('postuler');

    }

    /**
     * 
     * @Route("recruter/postule/{id}", name="candidat_postuler")
     * 
     */
        public function showCandidatPostuler($id, EntityManagerInterface $entityManager): Response 
        {
            $offre = $entityManager->getRepository(Job::class)->findOneBy(['id'=>$id]);;
            $posts = $offre->getPostulers();

            return $this->render('postuleCandidat.html.twig',[
                'posts' => $posts
                
            ]);
        }
    }



