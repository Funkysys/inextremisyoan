<?php

namespace App\Tests;

use App\Entity\Article;
use App\Entity\Comment;
use PHPUnit\Framework\TestCase;

class ArticleUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $article = new Article();
        $datetime = new \DateTime();

        $article ->setTitle('la pomme de terre, ça fait plaisir')
            ->setContent('La Pomme de terre ou patate (langage familier, canadianisme et belgicisme) est un tubercule comestible produit par l’espèce Solanum tuberosum, appartenant à la famille des solanacées. Le terme désigne également la plante elle-même, plante herbacée, vivace par ses tubercules mais toujours cultivée comme une culture annuelle. La pomme de terre est une plante qui réussit dans la plupart des sols, mais elle préfère les sols légers et légèrement acides. La plante est sujette aux maladies dans des sols calcaires ou manquant d’humus1.
La pomme de terre est originaire de la cordillère des Andes (Pérou), dans le Sud-Ouest de l’Amérique du Sud où son utilisation remonte à environ 8 000 ans. Introduite en Europe vers la fin du XVIe siècle à la suite de la découverte de l’Amérique par les conquistadors espagnols, elle s’est rapidement diffusée dans le monde et est en 2015 cultivée dans plus de 150 pays sous pratiquement toutes les latitudes habitées. ')
            ->setImage('./assert/image')
            ->setPostDate($datetime)
        ;

        $this->assertSame($article->getTitle(), 'la pomme de terre, ça fait plaisir');
        $this->assertSame($article->getContent(), 'La Pomme de terre ou patate (langage familier, canadianisme et belgicisme) est un tubercule comestible produit par l’espèce Solanum tuberosum, appartenant à la famille des solanacées. Le terme désigne également la plante elle-même, plante herbacée, vivace par ses tubercules mais toujours cultivée comme une culture annuelle. La pomme de terre est une plante qui réussit dans la plupart des sols, mais elle préfère les sols légers et légèrement acides. La plante est sujette aux maladies dans des sols calcaires ou manquant d’humus1.
La pomme de terre est originaire de la cordillère des Andes (Pérou), dans le Sud-Ouest de l’Amérique du Sud où son utilisation remonte à environ 8 000 ans. Introduite en Europe vers la fin du XVIe siècle à la suite de la découverte de l’Amérique par les conquistadors espagnols, elle s’est rapidement diffusée dans le monde et est en 2015 cultivée dans plus de 150 pays sous pratiquement toutes les latitudes habitées. ');
        $this->assertSame($article->getImage(), './assert/image');
        $this->assertSame($article->getPostDate(), $datetime);
    }

    public function testIsFalse(): void
    {
        $article = new Article();
        $datetime = new \DateTime();

        $article ->setTitle('la pomme de terre, ça fait plaisir')
            ->setContent('La Pomme de terre ou patate (langage familier, canadianisme et belgicisme) est un tubercule comestible produit par l’espèce Solanum tuberosum, appartenant à la famille des solanacées. Le terme désigne également la plante elle-même, plante herbacée, vivace par ses tubercules mais toujours cultivée comme une culture annuelle. La pomme de terre est une plante qui réussit dans la plupart des sols, mais elle préfère les sols légers et légèrement acides. La plante est sujette aux maladies dans des sols calcaires ou manquant d’humus1.
La pomme de terre est originaire de la cordillère des Andes (Pérou), dans le Sud-Ouest de l’Amérique du Sud où son utilisation remonte à environ 8 000 ans. Introduite en Europe vers la fin du XVIe siècle à la suite de la découverte de l’Amérique par les conquistadors espagnols, elle s’est rapidement diffusée dans le monde et est en 2015 cultivée dans plus de 150 pays sous pratiquement toutes les latitudes habitées. ')
            ->setImage('./assert/image')
            ->setPostDate($datetime)
        ;

        $this->assertNotSame($article->getTitle(), 'false');
        $this->assertNotSame($article->getContent(), 'false');
        $this->assertNotSame($article->getImage(), './assert/false');
        $this->assertNotSame($article->getPostDate(), new \DateTime());
    }

    public function testIsEmpty(): void
    {
        $article = new Article();

        $this->assertEmpty($article->getTitle());
        $this->assertEmpty($article->getContent());
        $this->assertEmpty($article->getImage());
        $this->assertEmpty($article->getPostDate());
        $this->assertEmpty($article->getId());
    }

    public function testAddGetRemoveComment()
    {
        $article = new Article();
        $comment = new Comment();

        $this->assertEmpty($article->getComments());

        $article->addComment($comment);
        $this->assertContains($comment, $article->getComments());

        $article->removeComment($comment);
        $this->assertEmpty($article->getComments());
    }
}
