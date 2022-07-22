<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220722094641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (code VARCHAR(255) NOT NULL, lang VARCHAR(255) NOT NULL, label_en VARCHAR(255) NOT NULL, label_fr VARCHAR(255) NOT NULL, label_es VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(code)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE city ADD country_code VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234F92F3E70 FOREIGN KEY (country_code) REFERENCES country (code)');
        $this->addSql('CREATE INDEX IDX_2D5B0234F92F3E70 ON city (country_code)');
        $this->addSql('ALTER TABLE user ADD city_id INT NOT NULL, ADD country_code VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F92F3E70 FOREIGN KEY (country_code) REFERENCES country (code)');
        $this->addSql('CREATE INDEX IDX_8D93D6498BAC62AF ON user (city_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649F92F3E70 ON user (country_code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234F92F3E70');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F92F3E70');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP INDEX IDX_2D5B0234F92F3E70 ON city');
        $this->addSql('ALTER TABLE city DROP country_code');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498BAC62AF');
        $this->addSql('DROP INDEX IDX_8D93D6498BAC62AF ON user');
        $this->addSql('DROP INDEX IDX_8D93D649F92F3E70 ON user');
        $this->addSql('ALTER TABLE user DROP city_id, DROP country_code');
    }
}
