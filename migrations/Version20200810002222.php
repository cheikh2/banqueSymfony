<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810002222 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE type_compte ADD compte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_compte ADD CONSTRAINT FK_EC213958F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_EC213958F2C56620 ON type_compte (compte_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE type_compte DROP FOREIGN KEY FK_EC213958F2C56620');
        $this->addSql('DROP INDEX IDX_EC213958F2C56620 ON type_compte');
        $this->addSql('ALTER TABLE type_compte DROP compte_id');
    }
}
