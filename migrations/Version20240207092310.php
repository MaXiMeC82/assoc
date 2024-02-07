<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207092310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE competence');
        $this->addSql('ALTER TABLE responsable DROP FOREIGN KEY responsable_ibfk_1');
        $this->addSql('DROP INDEX responsabilite ON responsable');
        $this->addSql('ALTER TABLE responsable DROP responsabilite, DROP mot_de_passe, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE num_de_telephone num_de_telephone VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE role ADD id INT AUTO_INCREMENT NOT NULL, ADD relation_id INT NOT NULL, CHANGE responsabilite responsabilite VARCHAR(14) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A3256915B FOREIGN KEY (relation_id) REFERENCES responsable (id)');
        $this->addSql('CREATE INDEX IDX_57698A6A3256915B ON role (relation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competence (nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(nom)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE responsable ADD responsabilite VARCHAR(50) DEFAULT NULL, ADD mot_de_passe VARCHAR(50) DEFAULT NULL, CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE prenom prenom VARCHAR(50) NOT NULL, CHANGE num_de_telephone num_de_telephone VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE responsable ADD CONSTRAINT responsable_ibfk_1 FOREIGN KEY (responsabilite) REFERENCES role (responsabilite)');
        $this->addSql('CREATE INDEX responsabilite ON responsable (responsabilite)');
        $this->addSql('ALTER TABLE role MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6A3256915B');
        $this->addSql('DROP INDEX IDX_57698A6A3256915B ON role');
        $this->addSql('DROP INDEX `PRIMARY` ON role');
        $this->addSql('ALTER TABLE role DROP id, DROP relation_id, CHANGE responsabilite responsabilite VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE role ADD PRIMARY KEY (responsabilite)');
    }
}
