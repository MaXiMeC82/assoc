<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207092538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE responsable CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A3256915B FOREIGN KEY (relation_id) REFERENCES responsable (id)');
        $this->addSql('CREATE INDEX IDX_57698A6A3256915B ON role (relation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE responsable CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A3256915B');
        $this->addSql('DROP INDEX IDX_57698A6A3256915B ON role');
    }
}
