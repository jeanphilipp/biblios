Biblios — Projet Symfony (ECF)
Installation du projet

1. Cloner le projet
   git clone https://github.com/jeanphilipp/biblios.git
   cd biblios

2. Installer les dépendances
   composer install

3. Configurer l’environnement
   Créer un fichier .env.local à la racine du projet :
   DATABASE_URL="mysql://root:@127.0.0.1:3306/biblios"

4. Créer la base de données
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate

5. Charger les fixtures
   php bin/console doctrine:fixtures:load

Lancer les tests

1. Créer la base de test
   php bin/console doctrine:database:create --env=test
   php bin/console doctrine:migrations:migrate --env=test
2. Lancer les tests PHPUnit
   php bin/phpunit
