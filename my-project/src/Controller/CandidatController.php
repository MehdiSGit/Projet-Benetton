<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Document;
use App\Entity\Job;
use App\Entity\CandidatProfil;
use App\Form\DocumentType;
use App\Form\CandidatProfilType;
use App\Repository\CandidatRepository;
use App\Repository\JobRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface as SessionSessionInterface;
use Symfony\Component\HttpFoundation\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/** 
 *@IsGranted("ROLE_CANDIDAT")
 */
class CandidatController extends AbstractController
{
    
    // /**
    //  * @Route("/candidat", name="candidat")
    //  */
    // public function index(Request $request): Response
    // {   
    //     $formulaire = $this->createForm(DocumentType::class)->handleRequest($request);

    //     return $this->render('candidat.html.twig', [
    //         'controller_name' => 'CandidatController',
    //         'formulaire' => $formulaire->createView()
            
    //     ]);
    // }

//     /**
//      * @Route("candidat/create", name="create_candidat")
//      *
//      * @param Request $request
//      * @param EntityManagerInterface $entityManager
//      * @param CandidatRepository $repository
//      * @return JsonResponse
//      */
//     public function create(Request $request, EntityManagerInterface $entityManager, CandidatRepository $repository) {
//         $content = $request->getContent();
//         $jsonParameters = json_decode($content, true);

//         $errorMessage = '';

//         $email = $jsonParameters['email'];
//         $firstname = $jsonParameters['firstname'];
//         $lastname = $jsonParameters['lastname'];

//         $candidat = new Candidat;

//         $candidat->setEmail($email)
//             ->setFirstName($firstname)
//             ->setLastName($lastname);

// //        $entityManager->persist($candidat);
// //        $entityManager->flush();

//         return new JsonResponse([
//             'parameters' => $jsonParameters,
//             'message' => "Boubou",
//             'created entity' => $candidat,
//         ]);
//     }

    /**
     * @Route("/candidats", name="candidat")
     * 
     */
    public function profil(Request $request, EntityManagerInterface $entityManager, JobRepository $jobRepository): Response
    {   
        // TODO : Cette page est accessible UNIQUEMENT si on est connecté ET qu'on est un candidat
        // $this->getUser() récupère l'utilisateur connecté
        /** Candidat $candidat */
        $candidat = $this->getUser();
        // dd($candidat->getDocuments()[0]);
        
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
            return $this->redirectToRoute('candidat');
        }

        //$job = $jobRepository->findBy(['candidat' => $candidat]);
        

        return $this->render('candidat/candidat.html.twig', [
            'candidat' => $candidat,
            'formulaire2' => $formulaire2->createView()
        ]);
    }

    /// FUNCTION AddToFavorite//////////////////////////////////

    /**
     * @Route("/candidat/favoris", name="favoris")
     */
    public function favoris(SessionSessionInterface $session,JobRepository $jobRepository){
        
        $favoris = $session->get('favoris',[]);
        
        $favorisWithData = [];
        
        
        foreach( $favoris as $id=>$id){
            $favorisWithData[] = [
                'job' => $jobRepository->find($id),
                'id' => $id   
            ];
        }
        //dd($favorisWithData);
        return $this->render('favoris.html.twig',[
            'items' => $favorisWithData
        ]);
    }


    /**
     * @Route("/candidat/ajouterAuxFavoris/{id}", name="ajouter_favoris")
     */
    public function ajouterFavoris($id, SessionSessionInterface $session,EntityManagerInterface $entityManager){
        //access au SESSION
        
        //creer un 'favoris' vide en forme tableau associatif
        $favoris = $session->get('favoris',[]);
        
        // verifier si l'annonce n'est pas deja sur la liste
        if(!empty($favoris[$id])){
            // return message " Vous avez deja ajouté cette annonce"
            $this->addFlash('message-error-add', 'Vous avez deja ajouté cette annonce');
            return $this->redirectToRoute('displayJob',[
                'id' => $id,
            ]); 
        } else {
            $favoris[$id] = 1;
        }

        
        //remplir la session avec  le favoris
        $session->set('favoris',$favoris);
        //dd($session->get('favoris'));

        return $this->redirectToRoute('favoris');
    }

    /**
     * @Route("/candidat/favoris/remove/{id}", name="remove_favoris")
     */
    public function supprimerFavoris($id, SessionSessionInterface $session ){
        //recuperer la liste des favoris
        $favoris = $session->get('favoris',[]);

        //vider si il contient des elements
        if(!empty($favoris[$id])){
            unset($favoris[$id]);
        }

        $session->set('favoris',$favoris);

        return $this->redirectToRoute("favoris"); 
    }

    // FUNCTION Postulez /////////////////////////////

    
    
}
