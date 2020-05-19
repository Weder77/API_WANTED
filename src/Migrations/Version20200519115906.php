<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519115906 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE area (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE monster (id INT AUTO_INCREMENT NOT NULL, area_id INT NOT NULL, name VARCHAR(60) NOT NULL, img_url VARCHAR(255) DEFAULT NULL, level INT DEFAULT NULL, url VARCHAR(255) NOT NULL, pv INT NOT NULL, pa INT NOT NULL, pm INT NOT NULL, res_terre INT NOT NULL, res_air INT NOT NULL, res_feu INT NOT NULL, res_eau INT NOT NULL, res_neutre INT NOT NULL, description LONGTEXT DEFAULT NULL, position VARCHAR(30) NOT NULL, INDEX IDX_245EC6F4BD0F409C (area_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE monster DROP FOREIGN KEY FK_245EC6F4BD0F409C');
        $this->addSql('DROP TABLE area');
        $this->addSql('DROP TABLE monster');
    }
}
