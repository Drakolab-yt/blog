<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Types\Types;
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

    public function findAllByStatus(?bool $isDraft = null): array
    {
        $qb = $this->createQueryBuilder('a')
            ->select([
                'a',
                't',
            ])
            ->leftJoin('a.tags', 't')
        ;

        if (!is_null($isDraft)) {
            $qb
                ->where(predicates: 'a.draft = :isDraft')
                ->setParameter(key: 'isDraft', value: $isDraft, type: Types::BOOLEAN)
            ;
        }

        return $qb->getQuery()->getResult();
    }
}
