<?php

namespace App\Tests\Data;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\ORM\EntityManagerInterface;
use App\DataFixtures\AppFixtures;
use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Editor;

class FixturesDataTest extends WebTestCase
{
    public function testFixturesLoadData(): void
    {
        $client = static::createClient();
        $container = static::getContainer();

        $em = $container->get(EntityManagerInterface::class);

        // Charger les fixtures
        $fixtures = new AppFixtures();
        $fixtures->load($em);

        // Vérifier qu'il y a au moins 1 livre, 1 auteur, 1 éditeur
        $this->assertGreaterThan(0, $em->getRepository(Book::class)->count([]));
        $this->assertGreaterThan(0, $em->getRepository(Author::class)->count([]));
        $this->assertGreaterThan(0, $em->getRepository(Editor::class)->count([]));
    }
}
