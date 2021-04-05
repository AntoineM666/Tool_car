<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210402112546 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, filename VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, marque VARCHAR(255) NOT NULL, kilometrage INT NOT NULL, carburant VARCHAR(255) DEFAULT NULL, imatriculation VARCHAR(255) DEFAULT NULL, porte INT DEFAULT NULL, puissance INT DEFAULT NULL, boite VARCHAR(255) DEFAULT NULL, miseencirculation DATE NOT NULL, model VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, options LONGTEXT DEFAULT NULL, revision LONGTEXT DEFAULT NULL, numero VARCHAR(255) DEFAULT NULL, annonce VARCHAR(255) DEFAULT NULL, nouvelleimat VARCHAR(255) DEFAULT NULL, prixachat INT DEFAULT NULL, prixvente INT DEFAULT NULL, garantie LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vehicule');
    }
}
