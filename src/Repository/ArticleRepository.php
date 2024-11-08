<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Order;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 *
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /** @return array<int, Article> */
    public function findForHome(): array
    {
        $qb = $this->createQueryBuilder('a'); // FROM article a
        $qb
            ->select([
                'a',
                't',
                'c',
            ])
            ->leftJoin('a.tags', 't') // LEFT JOIN article_tag ON ...
            ->leftJoin('a.category', 'c') // LEFT JOIN category ON ...
            ->orderBy('a.createdAt', Order::Descending->value); // ORDER BY a.created_at DESC

        return $qb->getQuery()->getResult();
    }
}
