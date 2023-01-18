<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113165320 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, activite_prestataire_id INT NOT NULL, activite_type_id INT NOT NULL, activite_randonnee_id INT NOT NULL, activite_adresse_id INT DEFAULT NULL, activite_offre_id INT NOT NULL, nom_activite VARCHAR(255) NOT NULL, description_activite VARCHAR(255) NOT NULL, date_activite DATETIME NOT NULL, place_maximum INT NOT NULL, afficher_activite TINYINT(1) NOT NULL, INDEX IDX_B875551563308B81 (activite_prestataire_id), INDEX IDX_B87555158FEA4B16 (activite_type_id), INDEX IDX_B87555158D36133C (activite_randonnee_id), INDEX IDX_B875551511174229 (activite_adresse_id), INDEX IDX_B8755515D1508132 (activite_offre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, numero_adresse VARCHAR(255) NOT NULL, rue_adresse VARCHAR(255) NOT NULL, code_postal_adresse INT NOT NULL, ville_adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catalogue_randonnee (id INT AUTO_INCREMENT NOT NULL, date_proposed_rando DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, nom_client VARCHAR(255) NOT NULL, prenom_client VARCHAR(255) NOT NULL, mail_client VARCHAR(255) NOT NULL, mot_de_passe_client VARCHAR(255) NOT NULL, INDEX IDX_C74404554DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_client_activite (id INT AUTO_INCREMENT NOT NULL, inscription_client_id INT NOT NULL, inscription_activite_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_50F1D8E2BFFEAB39 (inscription_client_id), INDEX IDX_50F1D8E26C7E1561 (inscription_activite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, nom_offre VARCHAR(255) NOT NULL, prix_offre DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, role_personnel VARCHAR(255) NOT NULL, nom_personnel VARCHAR(255) NOT NULL, prenom_personnel VARCHAR(255) NOT NULL, mail_personnel VARCHAR(255) NOT NULL, mot_de_passe_personnel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnel_activite (personnel_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_13044E501C109075 (personnel_id), INDEX IDX_13044E509B0F88B1 (activite_id), PRIMARY KEY(personnel_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire (id INT AUTO_INCREMENT NOT NULL, nom_prestataire VARCHAR(255) NOT NULL, description_prestataire LONGTEXT DEFAULT NULL, insee_prestataire INT DEFAULT NULL, ville_prestataire VARCHAR(255) DEFAULT NULL, geopoint_prestataire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire_type_prestataire (prestataire_id INT NOT NULL, type_prestataire_id INT NOT NULL, INDEX IDX_379F3CD0BE3DB2B7 (prestataire_id), INDEX IDX_379F3CD0E8FE9B23 (type_prestataire_id), PRIMARY KEY(prestataire_id, type_prestataire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE randonnee (id INT AUTO_INCREMENT NOT NULL, catalogue_randonnees_id INT DEFAULT NULL, nom_randonnee VARCHAR(255) NOT NULL, ville_randonnee VARCHAR(255) NOT NULL, type_randonnee VARCHAR(255) DEFAULT NULL, geometry_randonnee LONGTEXT NOT NULL, geopoint_randonnee VARCHAR(255) DEFAULT NULL, INDEX IDX_CB71A99F8DF90146 (catalogue_randonnees_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE soucription_client_offre (id INT AUTO_INCREMENT NOT NULL, offre_id INT NOT NULL, client_id INT NOT NULL, debut_souscription DATETIME NOT NULL, fin_souscription DATETIME NOT NULL, INDEX IDX_171086494CC8505A (offre_id), INDEX IDX_1710864919EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_activite (id INT AUTO_INCREMENT NOT NULL, nom_type_activite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_prestataire (id INT AUTO_INCREMENT NOT NULL, nom_type_prestataire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B875551563308B81 FOREIGN KEY (activite_prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B87555158FEA4B16 FOREIGN KEY (activite_type_id) REFERENCES type_activite (id)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B87555158D36133C FOREIGN KEY (activite_randonnee_id) REFERENCES randonnee (id)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B875551511174229 FOREIGN KEY (activite_adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515D1508132 FOREIGN KEY (activite_offre_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404554DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE inscription_client_activite ADD CONSTRAINT FK_50F1D8E2BFFEAB39 FOREIGN KEY (inscription_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE inscription_client_activite ADD CONSTRAINT FK_50F1D8E26C7E1561 FOREIGN KEY (inscription_activite_id) REFERENCES activite (id)');
        $this->addSql('ALTER TABLE personnel_activite ADD CONSTRAINT FK_13044E501C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnel_activite ADD CONSTRAINT FK_13044E509B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_type_prestataire ADD CONSTRAINT FK_379F3CD0BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_type_prestataire ADD CONSTRAINT FK_379F3CD0E8FE9B23 FOREIGN KEY (type_prestataire_id) REFERENCES type_prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE randonnee ADD CONSTRAINT FK_CB71A99F8DF90146 FOREIGN KEY (catalogue_randonnees_id) REFERENCES catalogue_randonnee (id)');
        $this->addSql('ALTER TABLE soucription_client_offre ADD CONSTRAINT FK_171086494CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE soucription_client_offre ADD CONSTRAINT FK_1710864919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B875551563308B81');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B87555158FEA4B16');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B87555158D36133C');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B875551511174229');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515D1508132');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404554DE7DC5C');
        $this->addSql('ALTER TABLE inscription_client_activite DROP FOREIGN KEY FK_50F1D8E2BFFEAB39');
        $this->addSql('ALTER TABLE inscription_client_activite DROP FOREIGN KEY FK_50F1D8E26C7E1561');
        $this->addSql('ALTER TABLE personnel_activite DROP FOREIGN KEY FK_13044E501C109075');
        $this->addSql('ALTER TABLE personnel_activite DROP FOREIGN KEY FK_13044E509B0F88B1');
        $this->addSql('ALTER TABLE prestataire_type_prestataire DROP FOREIGN KEY FK_379F3CD0BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire_type_prestataire DROP FOREIGN KEY FK_379F3CD0E8FE9B23');
        $this->addSql('ALTER TABLE randonnee DROP FOREIGN KEY FK_CB71A99F8DF90146');
        $this->addSql('ALTER TABLE soucription_client_offre DROP FOREIGN KEY FK_171086494CC8505A');
        $this->addSql('ALTER TABLE soucription_client_offre DROP FOREIGN KEY FK_1710864919EB6921');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE catalogue_randonnee');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE inscription_client_activite');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE personnel');
        $this->addSql('DROP TABLE personnel_activite');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE prestataire_type_prestataire');
        $this->addSql('DROP TABLE randonnee');
        $this->addSql('DROP TABLE soucription_client_offre');
        $this->addSql('DROP TABLE type_activite');
        $this->addSql('DROP TABLE type_prestataire');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
