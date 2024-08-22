<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    protected Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $tags = $manager->getRepository(Tag::class)->findAll();
        $categories = $manager->getRepository(Category::class)->findAll();

        for ($i = 0; $i < 150; $i++) {
            $category = $categories[array_rand($categories)];
            $art = new Article();
            $art
                ->setTitle($this->faker->unique()->text(mt_rand(20, 60)))
                ->setIntro($this->faker->optional(0.25)->realText(250))
                ->setContent($this->faker->realTextBetween(500, 2500))
                ->setCreatedAt(\DateTimeImmutable::createFromInterface($this->faker->dateTimeBetween('-5 year')))
                ->setCategory($category)
            ;

            $nbTags = mt_rand(1, 5);

            for ($j = 0; $j < $nbTags; $j++) {
                $tag = $tags[array_rand($tags)];
                $art->addTag($tag);
            }

            $manager->persist($art);
            $manager->flush();
        }

    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
            TagFixtures::class,
        ];
    }
}
