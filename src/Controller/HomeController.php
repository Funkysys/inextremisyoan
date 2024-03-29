<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $article = $articleRepository->lastThree();
        return $this->render('home/index.html.twig', [
            'article1' => $article[0],
            'article2' => $article[1],
            'article3' => $article[2],
        ]);
    }
}
