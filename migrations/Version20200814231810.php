<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200814231810 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte ADD typecompte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526011FA04BC FOREIGN KEY (typecompte_id) REFERENCES typecompte (id)');
        $this->addSql('CREATE INDEX IDX_CFF6526011FA04BC ON compte (typecompte_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526011FA04BC');
        $this->addSql('DROP INDEX IDX_CFF6526011FA04BC ON compte');
        $this->addSql('ALTER TABLE compte DROP typecompte_id');
    }
}
