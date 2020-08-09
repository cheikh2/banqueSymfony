<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200809132153 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE physique ADD moral_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE physique ADD CONSTRAINT FK_9FF928E7597AF0A1 FOREIGN KEY (moral_id) REFERENCES moral (id)');
        $this->addSql('CREATE INDEX IDX_9FF928E7597AF0A1 ON physique (moral_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE physique DROP FOREIGN KEY FK_9FF928E7597AF0A1');
        $this->addSql('DROP INDEX IDX_9FF928E7597AF0A1 ON physique');
        $this->addSql('ALTER TABLE physique DROP moral_id');
    }
}
