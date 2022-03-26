<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    #[Route('/sitemap.xml', name: 'app_sitemap', defaults: ["_format"=>"xml"])]
    public function index(Request $request, ArticleRepository $articleRepository, EventRepository $eventRepository): Response
    {
        $hostName = $request->getSchemeAndHttpHost();
        $urls = [];
        $urls[] = ['loc' => $this->generateUrl('app_home')];
        $urls[] = ['loc' => $this->generateUrl('app_event')];
        $urls[] = ['loc' => $this->generateUrl('app_contact')];
        $urls[] = ['loc' => $this->generateUrl('app_legal')];

        $response = new Response(
            $this->renderView('sitemap/index.html.twig', [
                'urls'      => $urls,
                'hostname'  => $hostName
            ]),
            200
        );

        $response->headers->set('Content-type', 'text/xml');

        return $response;
    }
}
