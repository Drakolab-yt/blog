<?php

namespace App\Twig;

use DateTime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Cette extension va être chargée automatiquement par Symfony (voir le chapitre sur l'injection de dépendances) et rendre des fonctions et des filtres disponibles dans nos templates.
 * Les noms de ces filtres et fonctions sont définis par le premier paramètre de TwigFilter et TwigFunction, le second désignant la méthode à appeler.
 */
class DateFormatterExtension extends AbstractExtension
{
    /**
     * @return array<\Twig\TwigFilter>
     */
    public function getFilters(): array
    {
        return [
            // on crée un filtre |articleDate qui appellera la méthode articleDate() de cet objet
            new TwigFilter('articleDate', [$this, 'articleDate']),
        ];
    }

    /**
     * @return array<\Twig\TwigFunction>
     */
    public function getFunctions(): array
    {
        return [
            // on crée une fonction dateFromString() qui appellera la méthode dateFromString() de cet objet
            new TwigFunction('dateFromString', [$this, 'dateFromString']),
        ];
    }

    public function articleDate(DateTime $date): string
    {
        return $date->format('d/m/Y H:i');
    }

    /**
     * @throws \Exception
     */
    public function dateFromString(string $date): string
    {
        return $this->articleDate(new DateTime($date));
    }
}