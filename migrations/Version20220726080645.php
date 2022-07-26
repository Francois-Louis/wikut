<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220726080645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, topic_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_23A0E662B36786B (title), INDEX IDX_23A0E661F55203D (topic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blade (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_217C01E85E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, subtitle VARCHAR(255) DEFAULT NULL, text LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_831B97227294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, country_code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, lat NUMERIC(10, 8) NOT NULL, lng NUMERIC(11, 8) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_2D5B0234F026BB7C (country_code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, project_id INT NOT NULL, answer_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), INDEX IDX_9474526C166D1F9C (project_id), INDEX IDX_9474526CAA334807 (answer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (code VARCHAR(255) NOT NULL, lang VARCHAR(255) NOT NULL, label_en VARCHAR(255) NOT NULL, label_fr VARCHAR(255) NOT NULL, label_es VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(code)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE handle (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_918020D95E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE handle_project (handle_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_7FC27F409C256C9C (handle_id), INDEX IDX_7FC27F40166D1F9C (project_id), PRIMARY KEY(handle_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE illustration (id INT AUTO_INCREMENT NOT NULL, block_id INT DEFAULT NULL, path VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D67B9A42E9ED820C (block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, path VARCHAR(255) NOT NULL, place SMALLINT DEFAULT 0 NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_16DB4F89166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, category_id INT NOT NULL, blade_id INT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, score SMALLINT DEFAULT 0, views INT DEFAULT 0, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_2FB3D0EEA76ED395 (user_id), INDEX IDX_2FB3D0EE12469DE2 (category_id), INDEX IDX_2FB3D0EE8118485F (blade_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rank (id INT AUTO_INCREMENT NOT NULL, access SMALLINT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, badge VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, informer_id INT DEFAULT NULL, target_user_id INT DEFAULT NULL, target_project_id INT DEFAULT NULL, target_comment_id INT DEFAULT NULL, problem LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_C42F77846FFB3625 (informer_id), INDEX IDX_C42F77846C066AFE (target_user_id), INDEX IDX_C42F77842481C70D (target_project_id), INDEX IDX_C42F7784CA85A582 (target_comment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_33BDB86A5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style_project (style_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_499F4EDABACD6074 (style_id), INDEX IDX_499F4EDA166D1F9C (project_id), PRIMARY KEY(style_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE topic (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_9D40DE1B5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, rank_id INT DEFAULT NULL, status_id INT DEFAULT NULL, city_id INT DEFAULT NULL, country_code VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, about LONGTEXT DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, instagram VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, score SMALLINT DEFAULT 0, company VARCHAR(255) DEFAULT NULL, banned TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D64986CC499D (pseudo), INDEX IDX_8D93D6497616678F (rank_id), INDEX IDX_8D93D6496BF700BD (status_id), INDEX IDX_8D93D6498BAC62AF (city_id), INDEX IDX_8D93D649F026BB7C (country_code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE follower_followed (follower_id INT NOT NULL, followed_id INT NOT NULL, INDEX IDX_24D3EC13AC24F853 (follower_id), INDEX IDX_24D3EC13D956F010 (followed_id), PRIMARY KEY(follower_id, followed_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blocker_blocked (blocker_id INT NOT NULL, blocked_id INT NOT NULL, INDEX IDX_BC5DB88D548D5975 (blocker_id), INDEX IDX_BC5DB88D21FF5136 (blocked_id), PRIMARY KEY(blocker_id, blocked_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_blade (user_id INT NOT NULL, blade_id INT NOT NULL, INDEX IDX_C3BEFAB0A76ED395 (user_id), INDEX IDX_C3BEFAB08118485F (blade_id), PRIMARY KEY(user_id, blade_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_handle (user_id INT NOT NULL, handle_id INT NOT NULL, INDEX IDX_F4D23BE4A76ED395 (user_id), INDEX IDX_F4D23BE49C256C9C (handle_id), PRIMARY KEY(user_id, handle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_style (user_id INT NOT NULL, style_id INT NOT NULL, INDEX IDX_D17F4332A76ED395 (user_id), INDEX IDX_D17F4332BACD6074 (style_id), PRIMARY KEY(user_id, style_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_category (user_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_E6C1FDC1A76ED395 (user_id), INDEX IDX_E6C1FDC112469DE2 (category_id), PRIMARY KEY(user_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vote (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, project_id INT NOT NULL, rate SMALLINT DEFAULT 0 NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_5A108564A76ED395 (user_id), INDEX IDX_5A108564166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E661F55203D FOREIGN KEY (topic_id) REFERENCES topic (id)');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B97227294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234F026BB7C FOREIGN KEY (country_code) REFERENCES country (code)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CAA334807 FOREIGN KEY (answer_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE handle_project ADD CONSTRAINT FK_7FC27F409C256C9C FOREIGN KEY (handle_id) REFERENCES handle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE handle_project ADD CONSTRAINT FK_7FC27F40166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE illustration ADD CONSTRAINT FK_D67B9A42E9ED820C FOREIGN KEY (block_id) REFERENCES block (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE8118485F FOREIGN KEY (blade_id) REFERENCES blade (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F77846FFB3625 FOREIGN KEY (informer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F77846C066AFE FOREIGN KEY (target_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F77842481C70D FOREIGN KEY (target_project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F7784CA85A582 FOREIGN KEY (target_comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE style_project ADD CONSTRAINT FK_499F4EDABACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_project ADD CONSTRAINT FK_499F4EDA166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497616678F FOREIGN KEY (rank_id) REFERENCES rank (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6496BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F026BB7C FOREIGN KEY (country_code) REFERENCES country (code)');
        $this->addSql('ALTER TABLE follower_followed ADD CONSTRAINT FK_24D3EC13AC24F853 FOREIGN KEY (follower_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE follower_followed ADD CONSTRAINT FK_24D3EC13D956F010 FOREIGN KEY (followed_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE blocker_blocked ADD CONSTRAINT FK_BC5DB88D548D5975 FOREIGN KEY (blocker_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE blocker_blocked ADD CONSTRAINT FK_BC5DB88D21FF5136 FOREIGN KEY (blocked_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_blade ADD CONSTRAINT FK_C3BEFAB0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_blade ADD CONSTRAINT FK_C3BEFAB08118485F FOREIGN KEY (blade_id) REFERENCES blade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_handle ADD CONSTRAINT FK_F4D23BE4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_handle ADD CONSTRAINT FK_F4D23BE49C256C9C FOREIGN KEY (handle_id) REFERENCES handle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_style ADD CONSTRAINT FK_D17F4332A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_style ADD CONSTRAINT FK_D17F4332BACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_category ADD CONSTRAINT FK_E6C1FDC1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_category ADD CONSTRAINT FK_E6C1FDC112469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B97227294869C');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE8118485F');
        $this->addSql('ALTER TABLE user_blade DROP FOREIGN KEY FK_C3BEFAB08118485F');
        $this->addSql('ALTER TABLE illustration DROP FOREIGN KEY FK_D67B9A42E9ED820C');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE12469DE2');
        $this->addSql('ALTER TABLE user_category DROP FOREIGN KEY FK_E6C1FDC112469DE2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498BAC62AF');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CAA334807');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F7784CA85A582');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234F026BB7C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F026BB7C');
        $this->addSql('ALTER TABLE handle_project DROP FOREIGN KEY FK_7FC27F409C256C9C');
        $this->addSql('ALTER TABLE user_handle DROP FOREIGN KEY FK_F4D23BE49C256C9C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C166D1F9C');
        $this->addSql('ALTER TABLE handle_project DROP FOREIGN KEY FK_7FC27F40166D1F9C');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89166D1F9C');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F77842481C70D');
        $this->addSql('ALTER TABLE style_project DROP FOREIGN KEY FK_499F4EDA166D1F9C');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564166D1F9C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497616678F');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6496BF700BD');
        $this->addSql('ALTER TABLE style_project DROP FOREIGN KEY FK_499F4EDABACD6074');
        $this->addSql('ALTER TABLE user_style DROP FOREIGN KEY FK_D17F4332BACD6074');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E661F55203D');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEA76ED395');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F77846FFB3625');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F77846C066AFE');
        $this->addSql('ALTER TABLE follower_followed DROP FOREIGN KEY FK_24D3EC13AC24F853');
        $this->addSql('ALTER TABLE follower_followed DROP FOREIGN KEY FK_24D3EC13D956F010');
        $this->addSql('ALTER TABLE blocker_blocked DROP FOREIGN KEY FK_BC5DB88D548D5975');
        $this->addSql('ALTER TABLE blocker_blocked DROP FOREIGN KEY FK_BC5DB88D21FF5136');
        $this->addSql('ALTER TABLE user_blade DROP FOREIGN KEY FK_C3BEFAB0A76ED395');
        $this->addSql('ALTER TABLE user_handle DROP FOREIGN KEY FK_F4D23BE4A76ED395');
        $this->addSql('ALTER TABLE user_style DROP FOREIGN KEY FK_D17F4332A76ED395');
        $this->addSql('ALTER TABLE user_category DROP FOREIGN KEY FK_E6C1FDC1A76ED395');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564A76ED395');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE blade');
        $this->addSql('DROP TABLE block');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE handle');
        $this->addSql('DROP TABLE handle_project');
        $this->addSql('DROP TABLE illustration');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE rank');
        $this->addSql('DROP TABLE report');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE style_project');
        $this->addSql('DROP TABLE topic');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE follower_followed');
        $this->addSql('DROP TABLE blocker_blocked');
        $this->addSql('DROP TABLE user_blade');
        $this->addSql('DROP TABLE user_handle');
        $this->addSql('DROP TABLE user_style');
        $this->addSql('DROP TABLE user_category');
        $this->addSql('DROP TABLE vote');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
