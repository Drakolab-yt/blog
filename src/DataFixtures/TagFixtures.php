<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use App\Repository\ArticleRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(protected ArticleRepository $articleRepository)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $articles = $this->articleRepository->findAll();

        for ($i = 0; $i < 10; $i++) {
            $tag = new Tag();
            $tag->setName('Tag '.$i);

            $nbArticles = mt_rand(0, count($articles) - 1);

            for ($j = 0; $j < $nbArticles; $j++) {
                $key = mt_rand(0, count($articles) - 1);
                $article = $articles[$key];
                $tag->addArticle($article);
            }

            $manager->persist($tag);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ArticleFixtures::class,
        ];
    }
}