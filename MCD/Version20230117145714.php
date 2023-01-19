<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230117145714 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom_client VARCHAR(255) NOT NULL, prenom_client VARCHAR(255) NOT NULL, telephone_client VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_C82E74E7927C74 (email), INDEX IDX_C82E744DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_clients_activite (id INT AUTO_INCREMENT NOT NULL, clients_id INT NOT NULL, activites_id INT NOT NULL, inscription_activite_client DATETIME NOT NULL, INDEX IDX_E0E51019AB014612 (clients_id), INDEX IDX_E0E510195B8C31B7 (activites_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnels (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_7AC38C2BE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnels_activite (personnels_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_C5C9372FC7022806 (personnels_id), INDEX IDX_C5C9372F9B0F88B1 (activite_id), PRIMARY KEY(personnels_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE souscription_client_offre (id INT AUTO_INCREMENT NOT NULL, offres_id INT NOT NULL, clients_id INT NOT NULL, fin_souscription DATETIME NOT NULL, debut_souscription DATETIME NOT NULL, INDEX IDX_612B97216C83CD9F (offres_id), INDEX IDX_612B9721AB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E744DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE inscription_clients_activite ADD CONSTRAINT FK_E0E51019AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE inscription_clients_activite ADD CONSTRAINT FK_E0E510195B8C31B7 FOREIGN KEY (activites_id) REFERENCES activite (id)');
        $this->addSql('ALTER TABLE personnels_activite ADD CONSTRAINT FK_C5C9372FC7022806 FOREIGN KEY (personnels_id) REFERENCES personnels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnels_activite ADD CONSTRAINT FK_C5C9372F9B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE souscription_client_offre ADD CONSTRAINT FK_612B97216C83CD9F FOREIGN KEY (offres_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE souscription_client_offre ADD CONSTRAINT FK_612B9721AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE soucription_client_offre DROP FOREIGN KEY FK_1710864919EB6921');
        $this->addSql('ALTER TABLE soucription_client_offre DROP FOREIGN KEY FK_171086494CC8505A');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404554DE7DC5C');
        $this->addSql('ALTER TABLE personnel_activite DROP FOREIGN KEY FK_13044E501C109075');
        $this->addSql('ALTER TABLE personnel_activite DROP FOREIGN KEY FK_13044E509B0F88B1');
        $this->addSql('ALTER TABLE inscription_client_activite DROP FOREIGN KEY FK_50F1D8E26C7E1561');
        $this->addSql('ALTER TABLE inscription_client_activite DROP FOREIGN KEY FK_50F1D8E2BFFEAB39');
        $this->addSql('DROP TABLE personnel');
        $this->addSql('DROP TABLE soucription_client_offre');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE personnel_activite');
        $this->addSql('DROP TABLE inscription_client_activite');
        $this->addSql('ALTER TABLE activite CHANGE activite_prestataire_id activite_prestataire_id INT DEFAULT NULL, CHANGE activite_type_id activite_type_id INT DEFAULT NULL, CHANGE activite_randonnee_id activite_randonnee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestataire CHANGE geopoint_prestataire geopoint_prestataire VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, role_personnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom_personnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom_personnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mail_personnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mot_de_passe_personnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE soucription_client_offre (id INT AUTO_INCREMENT NOT NULL, offre_id INT NOT NULL, client_id INT NOT NULL, debut_souscription DATETIME NOT NULL, fin_souscription DATETIME NOT NULL, INDEX IDX_171086494CC8505A (offre_id), INDEX IDX_1710864919EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, nom_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mail_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mot_de_passe_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_C74404554DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personnel_activite (personnel_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_13044E501C109075 (personnel_id), INDEX IDX_13044E509B0F88B1 (activite_id), PRIMARY KEY(personnel_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE inscription_client_activite (id INT AUTO_INCREMENT NOT NULL, inscription_client_id INT NOT NULL, inscription_activite_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_50F1D8E26C7E1561 (inscription_activite_id), INDEX IDX_50F1D8E2BFFEAB39 (inscription_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE soucription_client_offre ADD CONSTRAINT FK_1710864919EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE soucription_client_offre ADD CONSTRAINT FK_171086494CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404554DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE personnel_activite ADD CONSTRAINT FK_13044E501C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnel_activite ADD CONSTRAINT FK_13044E509B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_client_activite ADD CONSTRAINT FK_50F1D8E26C7E1561 FOREIGN KEY (inscription_activite_id) REFERENCES activite (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE inscription_client_activite ADD CONSTRAINT FK_50F1D8E2BFFEAB39 FOREIGN KEY (inscription_client_id) REFERENCES client (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E744DE7DC5C');
        $this->addSql('ALTER TABLE inscription_clients_activite DROP FOREIGN KEY FK_E0E51019AB014612');
        $this->addSql('ALTER TABLE inscription_clients_activite DROP FOREIGN KEY FK_E0E510195B8C31B7');
        $this->addSql('ALTER TABLE personnels_activite DROP FOREIGN KEY FK_C5C9372FC7022806');
        $this->addSql('ALTER TABLE personnels_activite DROP FOREIGN KEY FK_C5C9372F9B0F88B1');
        $this->addSql('ALTER TABLE souscription_client_offre DROP FOREIGN KEY FK_612B97216C83CD9F');
        $this->addSql('ALTER TABLE souscription_client_offre DROP FOREIGN KEY FK_612B9721AB014612');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE inscription_clients_activite');
        $this->addSql('DROP TABLE personnels');
        $this->addSql('DROP TABLE personnels_activite');
        $this->addSql('DROP TABLE souscription_client_offre');
        $this->addSql('ALTER TABLE prestataire CHANGE geopoint_prestataire geopoint_prestataire VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE activite CHANGE activite_prestataire_id activite_prestataire_id INT NOT NULL, CHANGE activite_type_id activite_type_id INT NOT NULL, CHANGE activite_randonnee_id activite_randonnee_id INT NOT NULL');
    }
}
