<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Our Car Inventory', $crawler->filter('h2')->text());
    }

    public function testOffer(){
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Cars list', $crawler->filter('h2')->text());

        //We look for the "a" link and pass it to client->click to mock the click
        $link = $crawler->filter('a:contains("Show Details")')->eq(0)->link();
        $crawler=$client->click($link);
        $this->assertContains('S3 Tesla', $crawler->filter('h3')->text());
    }
}
