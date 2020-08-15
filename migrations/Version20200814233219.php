<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200814233219 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526011FA04BC');
        $this->addSql('CREATE TABLE typec (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE typecompte');
        $this->addSql('DROP INDEX IDX_CFF6526011FA04BC ON compte');
        $this->addSql('ALTER TABLE compte CHANGE typecompte_id typec_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260DEAB64C8 FOREIGN KEY (typec_id) REFERENCES typec (id)');
        $this->addSql('CREATE INDEX IDX_CFF65260DEAB64C8 ON compte (typec_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260DEAB64C8');
        $this->addSql('CREATE TABLE typecompte (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE typec');
        $this->addSql('DROP INDEX IDX_CFF65260DEAB64C8 ON compte');
        $this->addSql('ALTER TABLE compte CHANGE typec_id typecompte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526011FA04BC FOREIGN KEY (typecompte_id) REFERENCES typecompte (id)');
        $this->addSql('CREATE INDEX IDX_CFF6526011FA04BC ON compte (typecompte_id)');
    }
}
