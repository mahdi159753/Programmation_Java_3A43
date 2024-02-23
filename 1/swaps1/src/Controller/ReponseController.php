<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DiscussionRepository;
use App\Repository\ReponseRepository;
use App\Entity\Reponse;
use App\Repository\UtilisateurRepository;
use App\Entity\Utilisateur;
use App\Entity\Discussion;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;




class ReponseController extends AbstractController
{
    #[Route('gestion/discussion/{idDiscussion}/reponses', name: 'reponses_discussion')]
    public function index(int $idDiscussion, ReponseRepository $reponseRepository): Response
    {
        $reponseRepository = $this->getDoctrine()->getRepository(Reponse::class);
        $reponses = $reponseRepository->findBy(['idDiscussion' => $idDiscussion]);
        
        return $this->render('reponse/index.html.twig', [
            'reponses' => $reponses,
        ]);
    }
    #[Route('/deleteReponse/{idReponse}', name: 'deleteReponse')]
    public function deleteReponse($idReponse, ManagerRegistry $doctrine): Response
    {   
        $utilisateurRepository = $this->getDoctrine()->getRepository(Utilisateur::class);
        $utilisateur = $utilisateurRepository->find(1);
        $discussionRepository= $doctrine->getRepository(Discussion::class);
        $repositoryReponse = $doctrine->getRepository(Reponse::class);
        $reponse = $repositoryReponse->find($idReponse);
        $id=$reponse->getIdDiscussion()->getIdDiscussion(); 
        $em = $doctrine->getManager();
        $em->remove($reponse);
        $em->flush();

        
        return $this->redirectToRoute('front_discussion_detail', ['idDiscussion' => $id,  ]);
    }
   
}
