<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200810002042 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE compte_type_compte');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte_type_compte (compte_id INT NOT NULL, type_compte_id INT NOT NULL, INDEX IDX_C030B30C46032730 (type_compte_id), INDEX IDX_C030B30CF2C56620 (compte_id), PRIMARY KEY(compte_id, type_compte_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE compte_type_compte ADD CONSTRAINT FK_C030B30C46032730 FOREIGN KEY (type_compte_id) REFERENCES type_compte (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compte_type_compte ADD CONSTRAINT FK_C030B30CF2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id) ON DELETE CASCADE');
    }
}
