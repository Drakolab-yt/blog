<?php

namespace App\Twig;

use DateTime;
use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\Extra\Intl\IntlExtension;
use Twig\TwigFilter;

class ArticleExtension extends AbstractExtension
{
    public function __construct(
        protected IntlExtension $intlExtension,
        protected Environment $environment
    ) {}

    public function getFilters(): array
    {
        return [
            new TwigFilter('article_date', [$this, 'articleDate']),
        ];
    }

    /**
     * @throws \Twig\Error\RuntimeError
     */
    public function articleDate(DateTime $dateTime, ?string $dateFormat = 'long', ?string $timeFormat = 'short'): string
    {
        return $this->intlExtension->formatDateTime($this->environment, $dateTime, dateFormat: $dateFormat, timeFormat: $timeFormat);
    }
}