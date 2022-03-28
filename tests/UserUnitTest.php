<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{

        public function testIsTrue() : void
    {
        $user = new User();

        $user ->setEmail('true@test.com')
            ->setPassword('password')
            ->setFirstname('Antoine')
            ->setLastname('Delbos')
            ->setRoles(['ROLE_TEST'])
            ->setPassPhrasing('lestagemusicaldulotçadéfonce')
            ;

        $this->assertSame($user->getEmail(), 'true@test.com');
        $this->assertSame($user->getPassword(), 'password');
        $this->assertSame($user->getFirstname(), 'Antoine');
        $this->assertSame($user->getLastname(), 'Delbos');
        $this->assertSame($user->getRoles(), ['ROLE_TEST', 'ROLE_USER']);
        $this->assertSame($user->getPassPhrasing(), 'lestagemusicaldulotçadéfonce');
    }

    public function testIsFalse(): void
    {
        $user = new User();

        $user ->setEmail('true@test.com')
            ->setPassword('password')
            ->setFirstname('Antoine')
            ->setLastname('Delbos')
            ->setRoles(['ROLE_TEST'])
            ->setPassPhrasing('lestagemusicaldulotçadéfonce')
        ;

        $this->assertNotSame($user->getEmail(), 'false@test.com');
        $this->assertNotSame($user->getPassword(), 'false');
        $this->assertNotSame($user->getFirstname(), 'false');
        $this->assertNotSame($user->getLastname(), 'false');
        $this->assertNotSame($user->getRoles(), 'false');
        $this->assertNotSame($user->getPassPhrasing(), 'false');
    }

    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getUserIdentifier());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getLastname());
        $this->assertEmpty($user->getId());
    }
}
