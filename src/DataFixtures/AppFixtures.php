<?php

namespace App\DataFixtures;

use App\Factory\AuthorFactory;
use App\Factory\BookFactory;
use App\Factory\EditorFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        EditorFactory::createMany(20);
        AuthorFactory::createMany(50);

        // Création d'un utilisateur admin
        UserFactory::createOne([
            'email' => 'admin@demo.com',
            'roles' => ['ROLE_ADMIN'],
            'password' => 'admin', // Foundry hash automatiquement
        ]);

        // Création de 5 utilisateurs normaux
        UserFactory::createMany(5);

        BookFactory::createMany(100);
    }
}
