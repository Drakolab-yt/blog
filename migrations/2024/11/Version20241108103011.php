<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241108103011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'LAB-20 - Ajout des champs slug';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD slug VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE category ADD slug VARCHAR(64) NOT NULL');
        $this->addSql('ALTER TABLE tag ADD slug VARCHAR(64) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP slug');
        $this->addSql('ALTER TABLE article DROP slug');
        $this->addSql('ALTER TABLE tag DROP slug');
    }
}
