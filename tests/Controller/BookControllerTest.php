<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\ORM\EntityManagerInterface;
use App\DataFixtures\AppFixtures;

class BookControllerTest extends WebTestCase
{
    public function testPublicBookListIsAccessible(): void
    {
        // 1. Créer le client (démarre le kernel)
        $client = static::createClient();

        // 2. Récupérer le container
        $container = static::getContainer();

        // 3. Charger les fixtures manuellement
        $em = $container->get(EntityManagerInterface::class);
        $fixtures = new AppFixtures();
        $fixtures->load($em);

        // 4. Appeler la route
        $client->request('GET', '/book');

        // 5. Vérifier la réponse
        $this->assertResponseIsSuccessful();
    }
}
