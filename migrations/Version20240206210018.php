<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240206210018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE responsable DROP FOREIGN KEY responsable_ibfk_1');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE assister DROP FOREIGN KEY assister_ibfk_2');
        $this->addSql('ALTER TABLE assister DROP FOREIGN KEY assister_ibfk_1');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_1');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_2');
        $this->addSql('ALTER TABLE evaluer DROP FOREIGN KEY evaluer_ibfk_1');
        $this->addSql('ALTER TABLE evaluer DROP FOREIGN KEY evaluer_ibfk_2');
        $this->addSql('ALTER TABLE gerer DROP FOREIGN KEY gerer_ibfk_2');
        $this->addSql('ALTER TABLE gerer DROP FOREIGN KEY gerer_ibfk_1');
        $this->addSql('ALTER TABLE integrer DROP FOREIGN KEY integrer_ibfk_1');
        $this->addSql('ALTER TABLE integrer DROP FOREIGN KEY integrer_ibfk_2');
        $this->addSql('ALTER TABLE organiser DROP FOREIGN KEY organiser_ibfk_1');
        $this->addSql('ALTER TABLE organiser DROP FOREIGN KEY organiser_ibfk_2');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY posseder_ibfk_2');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY posseder_ibfk_1');
        $this->addSql('ALTER TABLE posseder_2 DROP FOREIGN KEY posseder_2_ibfk_1');
        $this->addSql('ALTER TABLE posseder_2 DROP FOREIGN KEY posseder_2_ibfk_2');
        $this->addSql('ALTER TABLE reunion DROP FOREIGN KEY reunion_ibfk_1');
        $this->addSql('ALTER TABLE utiliser DROP FOREIGN KEY utiliser_ibfk_2');
        $this->addSql('ALTER TABLE utiliser DROP FOREIGN KEY utiliser_ibfk_1');
        $this->addSql('DROP TABLE assister');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE evaluer');
        $this->addSql('DROP TABLE gerer');
        $this->addSql('DROP TABLE integrer');
        $this->addSql('DROP TABLE organiser');
        $this->addSql('DROP TABLE posseder');
        $this->addSql('DROP TABLE posseder_2');
        $this->addSql('DROP TABLE reunion');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE stagiaire');
        $this->addSql('DROP TABLE utiliser');
        $this->addSql('DROP INDEX responsabilite ON responsable');
        $this->addSql('ALTER TABLE responsable DROP responsabilite, DROP mot_de_passe, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE num_de_telephone num_de_telephone VARCHAR(20) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assister (id INT NOT NULL, id_1 INT NOT NULL, INDEX id_1 (id_1), INDEX IDX_31849FA5BF396750 (id), PRIMARY KEY(id, id_1)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE commentaire (id INT NOT NULL, id_1 INT DEFAULT NULL, id_2 INT DEFAULT NULL, date_commentaire DATE NOT NULL, texte VARCHAR(8000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, date_modification DATE DEFAULT NULL, INDEX id_2 (id_2), INDEX id_1 (id_1), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE competence (nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(nom)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE equipe (id INT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE evaluer (id INT NOT NULL, id_1 INT NOT NULL, commentaires VARCHAR(8000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, date_evaluation DATE NOT NULL, INDEX id_1 (id_1), INDEX IDX_B88061EFBF396750 (id), PRIMARY KEY(id, id_1)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE gerer (id INT NOT NULL, id_1 INT NOT NULL, INDEX id_1 (id_1), INDEX IDX_103C68BDBF396750 (id), PRIMARY KEY(id, id_1)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE integrer (id INT NOT NULL, id_1 INT NOT NULL, date_entree DATE NOT NULL, date_sortie DATE NOT NULL, INDEX id_1 (id_1), INDEX IDX_E76B18DDBF396750 (id), PRIMARY KEY(id, id_1)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE organiser (id INT NOT NULL, id_1 INT NOT NULL, INDEX id_1 (id_1), INDEX IDX_96054AFCBF396750 (id), PRIMARY KEY(id, id_1)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE posseder (id INT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX nom (nom), INDEX IDX_62EF7CBABF396750 (id), PRIMARY KEY(id, nom)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE posseder_2 (id INT NOT NULL, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX nom (nom), INDEX IDX_F3B41B2EBF396750 (id), PRIMARY KEY(id, nom)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reunion (id INT NOT NULL, id_1 INT NOT NULL, date_de_la_reunion DATE NOT NULL, lieu VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, comments VARCHAR(8000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, INDEX id_1 (id_1), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE role (responsabilite VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY(responsabilite)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stagiaire (id INT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, mot_de_passe VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, num_de_telephone VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, type_de_presence VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, url_du_cv VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, date_du_stage DATE DEFAULT NULL, is_validated TINYINT(1) NOT NULL, is_archived TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utiliser (nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, id INT NOT NULL, INDEX id (id), INDEX IDX_5C9491096C6E55B5 (nom), PRIMARY KEY(nom, id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE assister ADD CONSTRAINT assister_ibfk_2 FOREIGN KEY (id_1) REFERENCES reunion (id)');
        $this->addSql('ALTER TABLE assister ADD CONSTRAINT assister_ibfk_1 FOREIGN KEY (id) REFERENCES stagiaire (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_1 FOREIGN KEY (id_1) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_2 FOREIGN KEY (id_2) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE evaluer ADD CONSTRAINT evaluer_ibfk_1 FOREIGN KEY (id) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE evaluer ADD CONSTRAINT evaluer_ibfk_2 FOREIGN KEY (id_1) REFERENCES stagiaire (id)');
        $this->addSql('ALTER TABLE gerer ADD CONSTRAINT gerer_ibfk_2 FOREIGN KEY (id_1) REFERENCES reunion (id)');
        $this->addSql('ALTER TABLE gerer ADD CONSTRAINT gerer_ibfk_1 FOREIGN KEY (id) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE integrer ADD CONSTRAINT integrer_ibfk_1 FOREIGN KEY (id) REFERENCES stagiaire (id)');
        $this->addSql('ALTER TABLE integrer ADD CONSTRAINT integrer_ibfk_2 FOREIGN KEY (id_1) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE organiser ADD CONSTRAINT organiser_ibfk_1 FOREIGN KEY (id) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE organiser ADD CONSTRAINT organiser_ibfk_2 FOREIGN KEY (id_1) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT posseder_ibfk_2 FOREIGN KEY (nom) REFERENCES competence (nom)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT posseder_ibfk_1 FOREIGN KEY (id) REFERENCES responsable (id)');
        $this->addSql('ALTER TABLE posseder_2 ADD CONSTRAINT posseder_2_ibfk_1 FOREIGN KEY (id) REFERENCES stagiaire (id)');
        $this->addSql('ALTER TABLE posseder_2 ADD CONSTRAINT posseder_2_ibfk_2 FOREIGN KEY (nom) REFERENCES competence (nom)');
        $this->addSql('ALTER TABLE reunion ADD CONSTRAINT reunion_ibfk_1 FOREIGN KEY (id_1) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE utiliser ADD CONSTRAINT utiliser_ibfk_2 FOREIGN KEY (id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE utiliser ADD CONSTRAINT utiliser_ibfk_1 FOREIGN KEY (nom) REFERENCES competence (nom)');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE responsable ADD responsabilite VARCHAR(50) DEFAULT NULL, ADD mot_de_passe VARCHAR(50) DEFAULT NULL, CHANGE id id INT NOT NULL, CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE prenom prenom VARCHAR(50) NOT NULL, CHANGE num_de_telephone num_de_telephone VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE responsable ADD CONSTRAINT responsable_ibfk_1 FOREIGN KEY (responsabilite) REFERENCES role (responsabilite)');
        $this->addSql('CREATE INDEX responsabilite ON responsable (responsabilite)');
    }
}
