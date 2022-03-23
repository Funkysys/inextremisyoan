<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventWebTestCaseTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/event');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Evènements à venir');
    }

    public function testShouldDisplayOneEvent()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/event');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h3', 'article de test');
    }
}
