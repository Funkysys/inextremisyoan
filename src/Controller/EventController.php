<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{

    #[Route('/event', name: 'app_event')]
    public function index(EventRepository $eventRepository): Response
    {
        return $this->render('event/index.html.twig', [
            'lastEvents' => $eventRepository->lastEvent(),
            'oldEvents' => $eventRepository->oldEvent(),
        ]);
    }
}
