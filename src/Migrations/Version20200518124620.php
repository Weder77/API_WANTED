<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200518124620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wanted DROP FOREIGN KEY FK_D9E3B838DD842E46');
        $this->addSql('CREATE TABLE monster (id INT AUTO_INCREMENT NOT NULL, area_id INT NOT NULL, name VARCHAR(60) NOT NULL, img_url VARCHAR(255) DEFAULT NULL, level INT DEFAULT NULL, url VARCHAR(255) NOT NULL, pv INT NOT NULL, pa INT NOT NULL, pm INT NOT NULL, res_terre INT NOT NULL, res_air INT NOT NULL, res_feu INT NOT NULL, res_eau INT NOT NULL, res_neutre INT NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_245EC6F4BD0F409C (area_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE monster ADD CONSTRAINT FK_245EC6F4BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE wanted');
        $this->addSql('ALTER TABLE area CHANGE name name VARCHAR(60) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE position (id INT AUTO_INCREMENT NOT NULL, coordinates VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE wanted (id INT AUTO_INCREMENT NOT NULL, area_id INT NOT NULL, position_id INT NOT NULL, name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, level INT NOT NULL, vitality INT NOT NULL, action_points INT NOT NULL, movement_points INT NOT NULL, resistance INT NOT NULL, url_img LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, url_bestiaire LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_D9E3B838BD0F409C (area_id), INDEX IDX_D9E3B838DD842E46 (position_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE wanted ADD CONSTRAINT FK_D9E3B838BD0F409C FOREIGN KEY (area_id) REFERENCES area (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE wanted ADD CONSTRAINT FK_D9E3B838DD842E46 FOREIGN KEY (position_id) REFERENCES position (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE monster');
        $this->addSql('ALTER TABLE area CHANGE name name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
