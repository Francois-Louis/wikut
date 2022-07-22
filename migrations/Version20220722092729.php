<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220722092729 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, project_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), INDEX IDX_9474526C166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment_comment (comment_source INT NOT NULL, comment_target INT NOT NULL, INDEX IDX_6707307C95992761 (comment_source), INDEX IDX_6707307C8C7C77EE (comment_target), PRIMARY KEY(comment_source, comment_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE comment_comment ADD CONSTRAINT FK_6707307C95992761 FOREIGN KEY (comment_source) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment_comment ADD CONSTRAINT FK_6707307C8C7C77EE FOREIGN KEY (comment_target) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vote CHANGE rate rate SMALLINT DEFAULT 0 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment_comment DROP FOREIGN KEY FK_6707307C95992761');
        $this->addSql('ALTER TABLE comment_comment DROP FOREIGN KEY FK_6707307C8C7C77EE');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE comment_comment');
        $this->addSql('ALTER TABLE vote CHANGE rate rate SMALLINT NOT NULL');
    }
}
