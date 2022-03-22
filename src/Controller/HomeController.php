<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/{id}', name: 'app_home')]
    public function index(ArticleRepository $articleRepository, int $id): Response
    {
        $article = $articleRepository->findAll();


        return $this->render('home/index.html.twig', [
            'articles' => $article
        ]);
    }
}
