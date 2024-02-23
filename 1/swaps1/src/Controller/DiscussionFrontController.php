<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\DiscussionRepository;
use App\Repository\ReponseRepository;
use App\Entity\Reponse;
use App\Repository\UtilisateurRepository;
use App\Entity\Utilisateur;
use App\Entity\Discussion;
use Symfony\Component\HttpFoundation\Request;
use App\Form\DiscussionType;
use App\Form\ReponseType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\EntityManagerInterface;
use Google\Cloud\Language\V1\LanguageServiceClient;
use Google\Auth\CredentialsLoader;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DomCrawler\Crawler;
use Knp\Component\Pager\PaginatorInterface;
use  App\Twig\MyMemoryTranslator;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;









class DiscussionFrontController extends AbstractController
{
    #[Route('/discussion', name: 'front_discussion')]
public function index(PaginatorInterface $paginator, Request $request): Response
{
    $entityManager = $this->getDoctrine()->getManager();
    $utilisateurRepository = $entityManager->getRepository(Utilisateur::class);
    $utilisateur = $utilisateurRepository->find(1);
    
    $discussionRepository = $entityManager->getRepository(Discussion::class);
    $discussions = $discussionRepository->findAll();
    // Utilisez la méthode paginate pour paginer les résultats
    $pagination = $paginator->paginate(
        $discussionRepository->createQueryBuilder('d')->orderBy('d.dateDiscussion', 'DESC')->getQuery(),
        $request->query->getInt('page', 1), // Numéro de page
        2 // Nombre de résultats par page
    );
    $pageCount = $pagination->getPageCount();

    return $this->render('discussion_front/index.html.twig', [
        'user' => $utilisateur,
        'discussions' => $pagination,
        'discussionRepository'=>$discussionRepository,
         'pageCount' => $pageCount,
         'pagination' => $pagination,


    ]);
}
    








        

    #[Route('/discussion/new', name: 'new_discussion')]
public function nouvelleDiscussion(Request $request)
{     $entityManager = $this->getDoctrine()->getManager();
    $utilisateurRepository = $entityManager->getRepository(Utilisateur::class);
    $utilisateur = $utilisateurRepository->find(1);
    $discussion = new Discussion();
    $form = $this->createForm(DiscussionType::class, $discussion);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $discussion = $form->getData();
        
        $discussion->setDateDiscussion(new \DateTime());
        if ($form->get('imageDiscussion')->getData() !== null) {
            $imageFile = $form->get('imageDiscussion')->getData();
        
            $fileName = md5(uniqid()).'.'.$imageFile->guessExtension();
        
            $imageFile->move(
                $this->getParameter('uploads_directory'),
                $fileName
            );
        
            $discussion->setImageDiscussion($fileName);
        } else {
            $discussion->setImageDiscussion('');
        }
        // à changer matansech 
        $discussion->setIdUser($utilisateur);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($discussion);
        $entityManager->flush();
        $this->addFlash('success', 'Discussion ajouté avec succès !');

        return $this->redirectToRoute('front_discussion');
    }

    return $this->render('discussion_front/nouvelle.html.twig', [
        'form' => $form->createView(),
    ]);
}






#[Route('/discussion/{idDiscussion}', name: 'front_discussion_detail')]
public function show(Request $request, Discussion $discussion): Response
{
    $apiKey = '7fddea0bbd0fecb045c5'; // or read from a configuration file
    $MyMemoryTranslator = new MyMemoryTranslator($apiKey);

    $isTranslated=false;
    $discussionRepository = $this->getDoctrine()->getRepository(Discussion::class);
    $reponseRepository = $this->getDoctrine()->getRepository(Reponse::class);
    $utilisateurRepository = $this->getDoctrine()->getRepository(Utilisateur::class);
    $utilisateur = $utilisateurRepository->find(1);
    $editMode=false;
    $editMode = isset($_GET['editMode']);
    $reponseEditMode = array_key_exists('editreponsemode', $_GET);
    $idEditReponse = 0;
    $reponseEditMode = isset($_GET['editreponsemode']);
$idEditReponse = isset($_GET['idEditReponse']) ? $_GET['idEditReponse'] : 1;
$reponse1 = $reponseRepository->find($idEditReponse);
$translatedContent="";
$translatedContent=$MyMemoryTranslator->translate($discussion->getContenuDiscussion(),'en','fr');
$editform = $this->createForm(ReponseType::class, $reponse1);
    if (array_key_exists('idEditReponse', $_GET)) {
        $idEditReponse = $_GET['idEditReponse'];
        $reponse1 = $reponseRepository->find($idEditReponse);
        $editform = $this->createForm(ReponseType::class, $reponse1);
    
        if ($reponseEditMode) {
            $editform->handleRequest($request);
        
            if ($editform->isSubmitted() && $editform->isValid()) {
                $reponse1 = $editform->getData();
                $contenuDiscussion = $editform->get('contenuReponse')->getData();
                
                $reponse1->setContenuReponse($contenuDiscussion);
    
                $em = $this->getDoctrine()->getManager();
                $em->flush();
        
                return $this->redirectToRoute('front_discussion_detail', ['idDiscussion' => $discussion->getIdDiscussion()]);
            }
        }
    }
    
    
    // assuming that the default mode is not edit mode
    $repositoryDiscussion = $this->getDoctrine()->getRepository(Discussion::class);
    $currentImage = $discussion->getImageDiscussion();
    

    $form1 = $this->createForm(DiscussionType::class, $discussion);
    $form1->remove('titreDiscussion'); // Supprimer le champ du titre

    $form1->handleRequest($request);
    if ($form1->isSubmitted() && $form1->isValid()) {
        $contenuDiscussion = $form1->get('contenuDiscussion')->getData();
        $discussion = $form1->getData();
        // Vérifier si une nouvelle image a été téléchargée
        if ($form1->get('imageDiscussion')->getData() !== null) {
            // Supprimer l'ancienne image si elle existe
            if ($currentImage !== '' && file_exists($this->getParameter('uploads_directory').'/'.$currentImage)) {
                unlink($this->getParameter('uploads_directory').'/'.$currentImage);
            }

            // Récupérer le fichier téléchargé
            $imageFile = $form1->get('imageDiscussion')->getData();
        
            // Générer un nom de fichier unique
            $fileName = md5(uniqid()).'.'.$imageFile->guessExtension();
        
            // Déplacer le fichier dans le répertoire d'upload
            $imageFile->move(
                $this->getParameter('uploads_directory'),
                $fileName
            );
        
            // Définir la valeur de l'image de evenement
            $discussion->setImageDiscussion($fileName);
        } else {
            // Conserver l'image actuelle si aucune nouvelle image n'a été téléchargée
            $discussion->setImageDiscussion($currentImage);
        }
        

        $em = $this->getDoctrine()->getManager();
        $em->flush();
        return $this->redirectToRoute('front_discussion_detail', ['idDiscussion' => $discussion->getIdDiscussion(),
        'user'=> $utilisateur,
        'discussionRepository'=>$discussionRepository,
        'reponseRepository'=>$reponseRepository,
        'translatedContent' => $translatedContent,
        'isTranslated'=>$isTranslated,


    ]);
    
    }

    

   
    $num = $reponseRepository->countReponses(['idDiscussion' => $discussion->getIdDiscussion()]);
    $reponses = $reponseRepository->findBy(['idDiscussion' => $discussion->getIdDiscussion()]);
    $reponse = new Reponse();
    $form = $this->createForm(ReponseType::class, $reponse);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        foreach ($form->getErrors(true, false) as $error) {
            dump($error->getMessage());
        }

    
        // Récupérez les données du formulaire
        $reponse = $form->getData();
        $reponse->setIdUser($utilisateur);

        $reponse->setIdDiscussion($discussion);
        $reponse->setDateReponse(new \DateTime());
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($reponse);
        $entityManager->flush();
        $this->addFlash('success', 'Réponse ajoutée avec succès !');
        return $this->redirectToRoute('front_discussion_detail', ['idDiscussion' => $discussion->getIdDiscussion()]);
    }
    
    return $this->render('discussion_front/detaildiscussion.html.twig', [
        'user' => $utilisateur,
        'discussion' => $discussion,
        'reponses' => $reponses,
        'num' => $num,
        'form' => $form->createView(),
        'reponseform'=> $editform ? $editform->createView() : null,
        'editreponsemode' => $reponseEditMode,
        'editMode' => $editMode, 
        'idEditReponse'=> $idEditReponse ,
        'discussionform' => $form1->createView(),
        'discussionRepository'=>$discussionRepository,
        'reponseRepository'=>$reponseRepository,
        'translatedContent' => $translatedContent,
        'isTranslated'=>$isTranslated,


    ]);
}
#[Route('/deleteDiscussion/{idDiscussion}', name: 'deleteDiscussion')]
        public function deleteDiscussion($idDiscussion, ManagerRegistry $doctrine): Response
        {
            $repositoryDiscussion = $doctrine->getRepository(Discussion::class);
            $discussion = $repositoryDiscussion->find($idDiscussion);
            $em = $doctrine->getManager();
            $em->remove($discussion);
            $em->flush();
    
            
            return $this->redirectToRoute('front_discussion');
        }

      
        

}    

