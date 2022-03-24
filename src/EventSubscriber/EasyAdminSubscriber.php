<?php

namespace App\EventSubscriber;

use App\Entity\Article;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    #[ArrayShape([BeforeEntityPersistedEvent::class => "string[]"])]
    public static function getSubscribedEvents(): array
    {
        return [
          BeforeEntityPersistedEvent::class => ['setArticleDate']
        ];
    }
    public function setArticleDate(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Article)) {
            return;
        }

        $now = new DateTime('now');
        $entity->setPostDate(new \DateTimeImmutable());

    }
}