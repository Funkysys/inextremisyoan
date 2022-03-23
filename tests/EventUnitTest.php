<?php

namespace App\Tests;

use App\Entity\Comment;
use App\Entity\Event;
use PHPUnit\Framework\TestCase;

class EventUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $event = new Event();
        $datetime = new \DateTime();

        $event ->setTitle('la pomme de terre, ça fait plaisir')
            ->setDescription('La Pomme de terre ou patate (langage familier, canadianisme et belgicisme) est un tubercule comestible produit par l’espèce Solanum tuberosum, appartenant à la famille des solanacées. Le terme désigne également la plante elle-même, plante herbacée, vivace par ses tubercules mais toujours cultivée comme une culture annuelle. La pomme de terre est une plante qui réussit dans la plupart des sols, mais elle préfère les sols légers et légèrement acides. La plante est sujette aux maladies dans des sols calcaires ou manquant d’humus1.
La pomme de terre est originaire de la cordillère des Andes (Pérou), dans le Sud-Ouest de l’Amérique du Sud où son utilisation remonte à environ 8 000 ans. Introduite en Europe vers la fin du XVIe siècle à la suite de la découverte de l’Amérique par les conquistadors espagnols, elle s’est rapidement diffusée dans le monde et est en 2015 cultivée dans plus de 150 pays sous pratiquement toutes les latitudes habitées. ')
            ->setPhoto('./assert/image')
            ->setDate($datetime)
        ;

        $this->assertSame($event->getTitle(), 'la pomme de terre, ça fait plaisir');
        $this->assertSame($event->getDescription(), 'La Pomme de terre ou patate (langage familier, canadianisme et belgicisme) est un tubercule comestible produit par l’espèce Solanum tuberosum, appartenant à la famille des solanacées. Le terme désigne également la plante elle-même, plante herbacée, vivace par ses tubercules mais toujours cultivée comme une culture annuelle. La pomme de terre est une plante qui réussit dans la plupart des sols, mais elle préfère les sols légers et légèrement acides. La plante est sujette aux maladies dans des sols calcaires ou manquant d’humus1.
La pomme de terre est originaire de la cordillère des Andes (Pérou), dans le Sud-Ouest de l’Amérique du Sud où son utilisation remonte à environ 8 000 ans. Introduite en Europe vers la fin du XVIe siècle à la suite de la découverte de l’Amérique par les conquistadors espagnols, elle s’est rapidement diffusée dans le monde et est en 2015 cultivée dans plus de 150 pays sous pratiquement toutes les latitudes habitées. ');
        $this->assertSame($event->getPhoto(), './assert/image');
        $this->assertSame($event->getDate(), $datetime);
    }

    public function testIsFalse(): void
    {
        $event = new Event();
        $datetime = new \DateTime();

        $event ->setTitle('la pomme de terre, ça fait plaisir')
            ->setDescription('La Pomme de terre ou patate (langage familier, canadianisme et belgicisme) est un tubercule comestible produit par l’espèce Solanum tuberosum, appartenant à la famille des solanacées. Le terme désigne également la plante elle-même, plante herbacée, vivace par ses tubercules mais toujours cultivée comme une culture annuelle. La pomme de terre est une plante qui réussit dans la plupart des sols, mais elle préfère les sols légers et légèrement acides. La plante est sujette aux maladies dans des sols calcaires ou manquant d’humus1.
La pomme de terre est originaire de la cordillère des Andes (Pérou), dans le Sud-Ouest de l’Amérique du Sud où son utilisation remonte à environ 8 000 ans. Introduite en Europe vers la fin du XVIe siècle à la suite de la découverte de l’Amérique par les conquistadors espagnols, elle s’est rapidement diffusée dans le monde et est en 2015 cultivée dans plus de 150 pays sous pratiquement toutes les latitudes habitées. ')
            ->setPhoto('./assert/image')
            ->setDate($datetime)
        ;

        $this->assertNotSame($event->getTitle(), 'false');
        $this->assertNotSame($event->getDescription(), 'false');
        $this->assertNotSame($event->getPhoto(), './assert/false');
        $this->assertNotSame($event->getDate(), new \DateTime());
    }

    public function testIsEmpty(): void
    {
        $event = new Event();

        $this->assertEmpty($event->getTitle());
        $this->assertEmpty($event->getDescription());
        $this->assertEmpty($event->getPhoto());
        $this->assertEmpty($event->getDate());
        $this->assertEmpty($event->getId());
    }

    public function testAddGetRemoveComment()
    {
        $event = new Event();
        $comment = new Comment();

        $this->assertEmpty($event->getComments());

        $event->addComment($comment);
        $this->assertContains($comment, $event->getComments());

        $event->removeComment($comment);
        $this->assertEmpty($event->getComments());
    }
}
