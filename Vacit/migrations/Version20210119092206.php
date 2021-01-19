<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210119092206 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE technology (id INT AUTO_INCREMENT NOT NULL, tech_name VARCHAR(255) DEFAULT NULL, tech_picture VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application CHANGE job_title job_title VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD technology_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job ADD CONSTRAINT FK_FBD8E0F84235D463 FOREIGN KEY (technology_id) REFERENCES technology (id)');
        $this->addSql('CREATE INDEX IDX_FBD8E0F84235D463 ON job (technology_id)');
        $this->addSql('ALTER TABLE user CHANGE user_motivation user_motivation VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job DROP FOREIGN KEY FK_FBD8E0F84235D463');
        $this->addSql('DROP TABLE technology');
        $this->addSql('ALTER TABLE application CHANGE job_title job_title CHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_FBD8E0F84235D463 ON job');
        $this->addSql('ALTER TABLE job DROP technology_id');
        $this->addSql('ALTER TABLE user CHANGE user_motivation user_motivation LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
