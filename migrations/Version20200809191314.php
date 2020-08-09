<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200809191314 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, moral_id INT DEFAULT NULL, physique_id INT DEFAULT NULL, num_agence VARCHAR(255) NOT NULL, num_compte VARCHAR(255) NOT NULL, rib VARCHAR(255) NOT NULL, montant VARCHAR(255) NOT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, INDEX IDX_CFF65260597AF0A1 (moral_id), INDEX IDX_CFF6526053D0E798 (physique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte_type_compte (compte_id INT NOT NULL, type_compte_id INT NOT NULL, INDEX IDX_C030B30CF2C56620 (compte_id), INDEX IDX_C030B30C46032730 (type_compte_id), PRIMARY KEY(compte_id, type_compte_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moral (id INT AUTO_INCREMENT NOT NULL, nom_empl VARCHAR(255) NOT NULL, ninea VARCHAR(255) NOT NULL, rc VARCHAR(255) NOT NULL, raison_social VARCHAR(255) DEFAULT NULL, adress_empl VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE physique (id INT AUTO_INCREMENT NOT NULL, moral_id INT DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, profession VARCHAR(255) DEFAULT NULL, cni VARCHAR(255) NOT NULL, salaire VARCHAR(255) DEFAULT NULL, INDEX IDX_9FF928E7597AF0A1 (moral_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_compte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260597AF0A1 FOREIGN KEY (moral_id) REFERENCES moral (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526053D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('ALTER TABLE compte_type_compte ADD CONSTRAINT FK_C030B30CF2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte_type_compte ADD CONSTRAINT FK_C030B30C46032730 FOREIGN KEY (type_compte_id) REFERENCES type_compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE physique ADD CONSTRAINT FK_9FF928E7597AF0A1 FOREIGN KEY (moral_id) REFERENCES moral (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte_type_compte DROP FOREIGN KEY FK_C030B30CF2C56620');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260597AF0A1');
        $this->addSql('ALTER TABLE physique DROP FOREIGN KEY FK_9FF928E7597AF0A1');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526053D0E798');
        $this->addSql('ALTER TABLE compte_type_compte DROP FOREIGN KEY FK_C030B30C46032730');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE compte_type_compte');
        $this->addSql('DROP TABLE moral');
        $this->addSql('DROP TABLE physique');
        $this->addSql('DROP TABLE type_compte');
    }
}
