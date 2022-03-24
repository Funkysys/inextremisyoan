<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginWebTestCaseTest extends WebTestCase
{

    public function testVistingWhileLoggedIn()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $buttonCrawlerNode = $crawler->selectButton('Connection');

        $form = $buttonCrawlerNode->form([
            'email'     => 'user@user.test',
            'password'  => 'pass_1234'
        ]);

        $client->submit($form);

        $crawler = $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
    }
}
