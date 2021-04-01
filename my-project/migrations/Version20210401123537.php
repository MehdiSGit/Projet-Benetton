<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210401123537 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document ADD candidat_id INT NOT NULL, DROP document');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A768D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('CREATE INDEX IDX_D8698A768D0EB82 ON document (candidat_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A768D0EB82');
        $this->addSql('DROP INDEX IDX_D8698A768D0EB82 ON document');
        $this->addSql('ALTER TABLE document ADD document VARBINARY(255) DEFAULT NULL, DROP candidat_id');
    }
}
