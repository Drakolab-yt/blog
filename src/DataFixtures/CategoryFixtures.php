<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class CategoryFixtures extends Fixture
{
    protected Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $category = new Category();
            $category
                ->setTitle($this->faker->text(mt_rand(20, 60)))
                ->setDescription($this->faker->realTextBetween(minNbChars: 60, maxNbChars: 250));
            $manager->persist($category);
        }

        $manager->flush();
    }
}
