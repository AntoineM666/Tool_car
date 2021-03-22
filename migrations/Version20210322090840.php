<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322090840 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carburant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, carburant_id INT NOT NULL, marque VARCHAR(255) NOT NULL, kilometrage INT NOT NULL, annee INT NOT NULL, imatriculation VARCHAR(255) NOT NULL, miseencirculation INT NOT NULL, porte INT NOT NULL, puissance INT NOT NULL, note VARCHAR(255) NOT NULL, INDEX IDX_292FFF1D32DAAD24 (carburant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D32DAAD24 FOREIGN KEY (carburant_id) REFERENCES carburant (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D32DAAD24');
        $this->addSql('DROP TABLE carburant');
        $this->addSql('DROP TABLE vehicule');
    }
}
