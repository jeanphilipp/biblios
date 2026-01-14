<?php

namespace App\Tests\Security;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class AdminAccessTest extends WebTestCase
{
    use Factories;
    use ResetDatabase;

    public function testAdminRedirectsToLoginWhenNotAuthenticated(): void
    {
        $client = static::createClient();

        $client->request('GET', '/admin/user/new');

        $this->assertResponseRedirects('/login');
    }

    public function testAdminAccessWithAdminUser(): void
    {
        $client = static::createClient();

        // ResetDatabase charge automatiquement AppFixtures
        // donc pas besoin de loadFixtures()

        $em = static::getContainer()->get(EntityManagerInterface::class);

        // Récupérer l'utilisateur admin créé dans AppFixtures
        $user = $em->getRepository(User::class)->findOneBy(['email' => 'admin@demo.com']);

        $client->loginUser($user);

        $client->request('GET', '/admin/user/new');

        $this->assertResponseIsSuccessful();
    }
}
