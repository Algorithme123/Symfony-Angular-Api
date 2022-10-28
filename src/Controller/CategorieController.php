<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CategorieController.php',
        ]);
    }



    
         /********************************************
         Liste des categories
        *******************************************/
    #[Route('/categorie/liste', name: 'liste')]
    public function allCategorie(CategorieRepository $categorieRepository)
    {

        $categorie= $categorieRepository->findAll();
        // dd($categorie);
         $response=$this->json($categorie,200,[],['groups' => ['lire:article','lire:categorie']]);
        return $response;
    }






         /********************************************
         Ajout  des categories
        *******************************************/


        #[Route('/categorie/ajout', name: 'app_categorie')]

        public function ajoutCategorie(Request $request, SerializerInterface $serializerInterface, EntityManagerInterface $em){
            $jsonRecu = $request->getContent();


            $categorie =$serializerInterface->deserialize($jsonRecu,Categorie::class,'json');
            $em->persist($categorie);
            $em->flush();
            return $this->json($categorie, 201, [], ['groups' => 'lire:categorie']);

        }

        /********************************************
         modification   des categories
        *******************************************/
        // #[Route('/categorie/edit/{edit}', name: 'edit_categorie')]




}
