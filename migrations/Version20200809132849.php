<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200809132849 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte_type_compte (compte_id INT NOT NULL, type_compte_id INT NOT NULL, INDEX IDX_C030B30CF2C56620 (compte_id), INDEX IDX_C030B30C46032730 (type_compte_id), PRIMARY KEY(compte_id, type_compte_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_compte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte_type_compte ADD CONSTRAINT FK_C030B30CF2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte_type_compte ADD CONSTRAINT FK_C030B30C46032730 FOREIGN KEY (type_compte_id) REFERENCES type_compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte ADD moral_id INT DEFAULT NULL, ADD physique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260597AF0A1 FOREIGN KEY (moral_id) REFERENCES moral (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526053D0E798 FOREIGN KEY (physique_id) REFERENCES physique (id)');
        $this->addSql('CREATE INDEX IDX_CFF65260597AF0A1 ON compte (moral_id)');
        $this->addSql('CREATE INDEX IDX_CFF6526053D0E798 ON compte (physique_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte_type_compte DROP FOREIGN KEY FK_C030B30C46032730');
        $this->addSql('DROP TABLE compte_type_compte');
        $this->addSql('DROP TABLE type_compte');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260597AF0A1');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526053D0E798');
        $this->addSql('DROP INDEX IDX_CFF65260597AF0A1 ON compte');
        $this->addSql('DROP INDEX IDX_CFF6526053D0E798 ON compte');
        $this->addSql('ALTER TABLE compte DROP moral_id, DROP physique_id');
    }
}
