<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $text = "Fixtures are used to load a \"fake\" set of data into a database that can then be used for testing or to help give you some interesting data while you're developing your application.

This bundle is compatible with any database supported by Doctrine ORM (MySQL, PostgreSQL, SQLite, etc.). If you are using MongoDB, you must use DoctrineMongoDBBundle instead.
Installation

In Symfony 4 or higher applications that use Symfony Flex, open a command console, enter your project directory and run the following command:

composer require --dev orm-fixtures

Starting from Symfony 4.0, Flex should be used by default and register the bundle for you, and in that case you can skip to the next section and start writing fixtures.

In Symfony 3 applications (or when not using Symfony Flex), run this other command instead:

composer require --dev doctrine/doctrine-fixtures-bundle";

        for ($i = 0; $i < 25; $i++) {
            $article = new Article();
            $article
                ->setTitle('Article '.$i)
                ->setDraft((bool) mt_rand(0, 1))
                ->setContent($text)
            ;
            $manager->persist($article);
        }
        $manager->flush();
    }
}