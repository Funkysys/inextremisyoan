<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Event;
use App\Entity\User;
use DateTimeInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @codeCoverageIgnore
 */
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

            $user = new User();
            $user   ->setEmail('user@user.test')
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setRoles(['ROLE_ADMIN'])
            ;
            $password = $this->hasher->hashPassword($user, 'pass_1234');
            $user->setPassword($password);

            $manager->persist($user);


        for ($i=0; $i < 3; $i++) {
            //test article creation
            $article = new Article();
            $date = new \DateTimeImmutable;

            $article    ->setTitle('article de test')
                ->setContent($faker->text(350))
                ->setImage($faker->image())
                ->setPostDate($date)
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

        $event = new Event();

        $event    ->setTitle('article de test')
            ->setDescription($faker->text(350))
            ->setPhoto($faker->image())
            ->setDate($faker->dateTime('now'))
        ;
        $manager->persist($event);

        $manager->flush();
    }
}
