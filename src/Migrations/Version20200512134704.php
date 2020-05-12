<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200512134704 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE position (id INT AUTO_INCREMENT NOT NULL, coordinates VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE area (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wanted (id INT AUTO_INCREMENT NOT NULL, area_id INT NOT NULL, position_id INT NOT NULL, name VARCHAR(50) NOT NULL, level INT NOT NULL, vitality INT NOT NULL, action_points INT NOT NULL, movement_points INT NOT NULL, resistance INT NOT NULL, url_img LONGTEXT DEFAULT NULL, url_bestiaire LONGTEXT NOT NULL, INDEX IDX_D9E3B838BD0F409C (area_id), INDEX IDX_D9E3B838DD842E46 (position_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wanted ADD CONSTRAINT FK_D9E3B838BD0F409C FOREIGN KEY (area_id) REFERENCES area (id)');
        $this->addSql('ALTER TABLE wanted ADD CONSTRAINT FK_D9E3B838DD842E46 FOREIGN KEY (position_id) REFERENCES position (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wanted DROP FOREIGN KEY FK_D9E3B838DD842E46');
        $this->addSql('ALTER TABLE wanted DROP FOREIGN KEY FK_D9E3B838BD0F409C');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE area');
        $this->addSql('DROP TABLE wanted');
    }
}
