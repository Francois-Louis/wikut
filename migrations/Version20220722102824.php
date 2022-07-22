<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220722102824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blade (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_217C01E85E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE handle (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_918020D95E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE handle_project (handle_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_7FC27F409C256C9C (handle_id), INDEX IDX_7FC27F40166D1F9C (project_id), PRIMARY KEY(handle_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_33BDB86A5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style_project (style_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_499F4EDABACD6074 (style_id), INDEX IDX_499F4EDA166D1F9C (project_id), PRIMARY KEY(style_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE handle_project ADD CONSTRAINT FK_7FC27F409C256C9C FOREIGN KEY (handle_id) REFERENCES handle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE handle_project ADD CONSTRAINT FK_7FC27F40166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_project ADD CONSTRAINT FK_499F4EDABACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_project ADD CONSTRAINT FK_499F4EDA166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE picture CHANGE place place SMALLINT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE project ADD blade_id INT NOT NULL');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE8118485F FOREIGN KEY (blade_id) REFERENCES blade (id)');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE8118485F ON project (blade_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE8118485F');
        $this->addSql('ALTER TABLE handle_project DROP FOREIGN KEY FK_7FC27F409C256C9C');
        $this->addSql('ALTER TABLE style_project DROP FOREIGN KEY FK_499F4EDABACD6074');
        $this->addSql('DROP TABLE blade');
        $this->addSql('DROP TABLE handle');
        $this->addSql('DROP TABLE handle_project');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE style_project');
        $this->addSql('ALTER TABLE picture CHANGE place place SMALLINT NOT NULL');
        $this->addSql('DROP INDEX IDX_2FB3D0EE8118485F ON project');
        $this->addSql('ALTER TABLE project DROP blade_id');
    }
}
