<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ArticleController.php',
        ]);
    }


    
         /********************************************
         Liste des Article
        *******************************************/
        #[Route('/article/liste', name: 'listeArt')]
        public function allArt(ArticleRepository $articleRepository)
        {
    
            $article= $articleRepository->findAll();
            // dd($article);
             $response=$this->json($article,200,[],['groups' => ['lire:article','lire:categorie']]);
            return $response;
        }
    
    
    

         /********************************************
         Ajout  des categories
        *******************************************/


        #[Route('/article/ajout', name: 'ajoutAertt')]

        public function ajoutArt(Request $request, SerializerInterface $serializerInterface, EntityManagerInterface $em){
            $jsonRecu = $request->getContent();


            $article =$serializerInterface->deserialize($jsonRecu,Article::class,'json');
            $em->persist($article);
            $em->flush();
            return $this->json($article, 201, [], ['groups' => ['lire:categorie','lire:article']]);

        }






}
