<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Event;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        // use the factory to create a Faker\Generator instance
        $faker = Factory::create('Fr');

        for ($i=0; $i < 4; $i++) {
            $user = new User();
            $user   ->setEmail($faker->email())
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName());
            $password = $this->hasher->hashPassword($user, 'pass_1234');
            $user->setPassword($password);

            $manager->persist($user);
        }
        for ($i=0; $i < 10; $i++) {
            $article = new Article();
            $article    ->setPostDate($faker->dateTime())
                        ->setImage($faker->image())
                        ->setTitle($faker->text())
                        ->setContent($faker->text())
                ;

            $manager->persist($article);

            for ($j = 0; $j < 3; $j++) {
                $comment = new Comment();
                $comment
                    ->setCreateAt(new \DateTimeImmutable())
                    ->setArticle($article)
                    ->setEmail($faker->email())
                    ->setTitle($faker->text())
                    ->setContent($faker->text())
                    ->setAuthor($faker->name())
                ;

                $manager->persist($comment);
            }
        }
        for ($i=0; $i < 10; $i++) {
            $event = new Event();
            $event  ->setDate($faker->dateTime())
                    ->setPhoto($faker->image())
                    ->setTitle($faker->text())
                    ->setDescription($faker->text())
            ;

            $manager->persist($event);

            for ($j = 0; $j < 4; $j++) {
                $comment = new Comment();
                $comment
                    ->setCreateAt(new \DateTimeImmutable())
                    ->setEmail($faker->email())
                    ->setTitle($faker->text())
                    ->setContent($faker->text())
                    ->setEvent($event)
                    ->setAuthor($faker->name())
                ;

                $manager->persist($comment);
            }
        }

        $manager->flush();
    }
}
