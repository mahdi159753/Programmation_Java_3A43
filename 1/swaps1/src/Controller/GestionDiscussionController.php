<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DiscussionRepository;
use App\Entity\Discussion;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;



class GestionDiscussionController extends AbstractController
{
    public function ajouterDiscussion(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $discussion = new Discussion();
        $discussion->setTitreDiscussion($request->request->get('titre'));
        $discussion->setContenuDiscussion($request->request->get('contenu'));
        $discussion->setDateDiscussion(new \DateTime());
        $discussion->setIdUser($this->getUser()); // Utilisateur connecté

        $entityManager->persist($discussion);
        $entityManager->flush();

        return $this->redirectToRoute('nom_de_la_route_vers_la_page_de_gestion_des_discussions');
    }





    #[Route('/gestion/discussion', name: 'app_gestion_discussion')]
    public function list(): Response
    {
        $discussionRepository = $this->getDoctrine()->getRepository(Discussion::class);
        $discussions = $this->getDoctrine()
    ->getRepository(Discussion::class)
    ->findAll();
        return $this->render('gestion_discussion/index.html.twig', [
            
                'discussions' => $discussions,
            ]
        );
    }
   
     /**
     * @Route("/discussions", name="discussions")
     */
    public function index2(Request $request, PaginatorInterface $paginator)
    {
        $queryBuilder = $this->getDoctrine()->getRepository(Discussion::class)->createQueryBuilder('d');

        $pagination = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            10 // Nombre de discussions affichées par page
        );

        return $this->render('discussions.html.twig', [
            'discussions' => $pagination,
        ]);
    }

    // Contrôleur Symfony
    #[Route('/gestion/discussion/search-ajax', name: 'search_by_user_ajax')]
    public function searchByUserAjax(Request $request, DiscussionRepository $discussionRepository)
    {
        $firstname = $request->query->get('firstname');
        $lastname = $request->query->get('lastname');
    
        $discussions = $discussionRepository->findByUser($firstname, $lastname);
    
        $data = array_map(function($discussion) {
            return [
                'id' => $discussion['idDiscussion'],
                'titre' => $discussion['titreDiscussion'],
                'contenu' => $discussion['contenuDiscussion'],
                'date' => $discussion['dateDiscussion']->format('Y-m-d')
            ];
        }, $discussions);
        
        
       
        
    }
    
}
