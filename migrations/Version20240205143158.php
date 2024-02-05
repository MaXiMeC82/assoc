<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240205143158 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE responsable DROP mot_de_passe, DROP num_de_telephone, DROP isActivated, DROP isArchived, DROP responsabilite, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE responsable ADD mot_de_passe VARCHAR(50) DEFAULT NULL, ADD num_de_telephone VARCHAR(10) DEFAULT NULL, ADD isActivated TINYINT(1) NOT NULL, ADD isArchived TINYINT(1) NOT NULL, ADD responsabilite VARCHAR(50) DEFAULT NULL, CHANGE id id INT NOT NULL, CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE prenom prenom VARCHAR(50) NOT NULL');
    }
}
