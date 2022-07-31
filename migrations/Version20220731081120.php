<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220731081120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rate (id INT AUTO_INCREMENT NOT NULL, value SMALLINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vote ADD rate_id INT DEFAULT NULL, DROP rate');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564BC999F9F FOREIGN KEY (rate_id) REFERENCES rate (id)');
        $this->addSql('CREATE INDEX IDX_5A108564BC999F9F ON vote (rate_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564BC999F9F');
        $this->addSql('DROP TABLE rate');
        $this->addSql('DROP INDEX IDX_5A108564BC999F9F ON vote');
        $this->addSql('ALTER TABLE vote ADD rate SMALLINT DEFAULT 0 NOT NULL, DROP rate_id');
    }
}
