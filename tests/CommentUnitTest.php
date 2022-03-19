<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Event;
use PHPUnit\Framework\TestCase;

class CommentUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $comment = new Comment();
        $datetime = new \DateTimeImmutable();
        $event = new Event();
        $article = new Article();

        $comment ->setTitle('la pomme de terre, ça fait plaisir')
            ->setContent('La Pomme de terre ou patate (langage familier, canadianisme et belgicisme) est un tubercule comestible produit par l’espèce Solanum tuberosum, appartenant à la famille des solanacées. Le terme désigne également la plante elle-même, plante herbacée, vivace par ses tubercules mais toujours cultivée comme une culture annuelle. La pomme de terre est une plante qui réussit dans la plupart des sols, mais elle préfère les sols légers et légèrement acides. La plante est sujette aux maladies dans des sols calcaires ou manquant d’humus1.
La pomme de terre est originaire de la cordillère des Andes (Pérou), dans le Sud-Ouest de l’Amérique du Sud où son utilisation remonte à environ 8 000 ans. Introduite en Europe vers la fin du XVIe siècle à la suite de la découverte de l’Amérique par les conquistadors espagnols, elle s’est rapidement diffusée dans le monde et est en 2015 cultivée dans plus de 150 pays sous pratiquement toutes les latitudes habitées. ')
            ->setEmail('coucou@test.com')
            ->setAuthor('antoine DELBOS')
            ->setCreateAt($datetime)
            ->setEvent($event)
            ->setArticle($article)
        ;

        $this->assertSame($comment->getTitle(), 'la pomme de terre, ça fait plaisir');
        $this->assertSame($comment->getContent(), 'La Pomme de terre ou patate (langage familier, canadianisme et belgicisme) est un tubercule comestible produit par l’espèce Solanum tuberosum, appartenant à la famille des solanacées. Le terme désigne également la plante elle-même, plante herbacée, vivace par ses tubercules mais toujours cultivée comme une culture annuelle. La pomme de terre est une plante qui réussit dans la plupart des sols, mais elle préfère les sols légers et légèrement acides. La plante est sujette aux maladies dans des sols calcaires ou manquant d’humus1.
La pomme de terre est originaire de la cordillère des Andes (Pérou), dans le Sud-Ouest de l’Amérique du Sud où son utilisation remonte à environ 8 000 ans. Introduite en Europe vers la fin du XVIe siècle à la suite de la découverte de l’Amérique par les conquistadors espagnols, elle s’est rapidement diffusée dans le monde et est en 2015 cultivée dans plus de 150 pays sous pratiquement toutes les latitudes habitées. ');
        $this->assertSame($comment->getAuthor(), 'antoine DELBOS');
        $this->assertSame($comment->getEmail(), 'coucou@test.com');
        $this->assertSame($comment->getCreateAt(), $datetime);
        $this->assertSame($comment->getEvent(), $event);
        $this->assertSame($comment->getArticle(), $article);
    }

    public function testIsFalse(): void
    {
        $comment = new Comment();
        $datetime = new \DateTimeImmutable();
        $event = new Event();
        $article = new Article();

        $comment ->setTitle('la pomme de terre, ça fait plaisir')
            ->setContent('La Pomme de terre ou patate (langage familier, canadianisme et belgicisme) est un tubercule comestible produit par l’espèce Solanum tuberosum, appartenant à la famille des solanacées. Le terme désigne également la plante elle-même, plante herbacée, vivace par ses tubercules mais toujours cultivée comme une culture annuelle. La pomme de terre est une plante qui réussit dans la plupart des sols, mais elle préfère les sols légers et légèrement acides. La plante est sujette aux maladies dans des sols calcaires ou manquant d’humus1.
La pomme de terre est originaire de la cordillère des Andes (Pérou), dans le Sud-Ouest de l’Amérique du Sud où son utilisation remonte à environ 8 000 ans. Introduite en Europe vers la fin du XVIe siècle à la suite de la découverte de l’Amérique par les conquistadors espagnols, elle s’est rapidement diffusée dans le monde et est en 2015 cultivée dans plus de 150 pays sous pratiquement toutes les latitudes habitées. ')
            ->setEmail('coucou@test.com')
            ->setAuthor('antoine DELBOS')
            ->setCreateAt($datetime)
            ->setEvent($event)
            ->setArticle($article)
        ;

        $this->assertNotSame($comment->getTitle(), 'false');
        $this->assertNotSame($comment->getContent(), 'false');
        $this->assertNotSame($comment->getAuthor(), 'false');
        $this->assertNotSame($comment->getEmail(), 'false');
        $this->assertNotSame($comment->getCreateAt(), new \DateTime());
        $this->assertNotSame($comment->getArticle(), new Article());
        $this->assertNotSame($comment->getEvent(), new Event());
    }

    public function testIsEmpty(): void
    {
        $comment = new Comment();

        $this->assertEmpty($comment->getTitle());
        $this->assertEmpty($comment->getContent());
        $this->assertEmpty($comment->getAuthor());
        $this->assertEmpty($comment->getEmail());
        $this->assertEmpty($comment->getCreateAt());
        $this->assertEmpty($comment->getArticle());
        $this->assertEmpty($comment->getEvent());
    }
}
