<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;


#[Route('/article', name: 'app_article')]
class ArticleController extends AbstractController
{

    #[Route('/{id}', name: 'app_article_show',methods: ['GET'])]
    public function show(Article $article): Response
    {
        return $this->render('article/index_show.html.twig', [
            "article" => $article,
        ]);
    }


    #[Route('/', name: 'app_article')]
    public function index(ArticleRepository $ArticleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController', 
            'articles' => $ArticleRepository->findAll(),
        ]);
    }
}
