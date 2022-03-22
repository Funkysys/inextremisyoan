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
        $lastEvent = $eventRepository->lastEvent();
        dump($lastEvent);
        $oldEvent = $eventRepository->oldEvent();
        dump($oldEvent);
        return $this->render('event/index.html.twig', [
            'lastEvents' => $lastEvent,
            'oldEvents' => $oldEvent,
        ]);
    }
}
