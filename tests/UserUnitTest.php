<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{

        public function testIsTrue()
    {
        $user = new User();

        $user ->setEmail('true@test.com')
            ->setPassword('password')
            ->setFirstname('Antoine')
            ->setLastname('Delbos')
            ;

        $this->assertSame($user->getEmail(), 'true@test.com');
        $this->assertSame($user->getPassword(), 'password');
        $this->assertSame($user->getFirstname(), 'Antoine');
        $this->assertSame($user->getLastname(), 'Delbos');
    }

    public function testIsFalse(): void
    {
        $user = new User();

        $user ->setEmail('true@test.com')
            ->setPassword('password')
            ->setFirstname('Antoine')
            ->setLastname('Delbos')
        ;

        $this->assertNotSame($user->getEmail(), 'false@test.com');
        $this->assertNotSame($user->getPassword(), 'false');
        $this->assertNotSame($user->getFirstname(), 'false');
        $this->assertNotSame($user->getLastname(), 'false');
    }

    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getLastname());
    }

}
