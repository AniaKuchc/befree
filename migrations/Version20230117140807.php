<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230117140807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404554DE7DC5C');
        $this->addSql('ALTER TABLE inscription_client_activite DROP FOREIGN KEY FK_50F1D8E2BFFEAB39');
        $this->addSql('ALTER TABLE inscription_client_activite DROP FOREIGN KEY FK_50F1D8E26C7E1561');
        $this->addSql('ALTER TABLE personnel_activite DROP FOREIGN KEY FK_13044E501C109075');
        $this->addSql('ALTER TABLE personnel_activite DROP FOREIGN KEY FK_13044E509B0F88B1');
        $this->addSql('ALTER TABLE soucription_client_offre DROP FOREIGN KEY FK_1710864919EB6921');
        $this->addSql('ALTER TABLE soucription_client_offre DROP FOREIGN KEY FK_171086494CC8505A');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE inscription_client_activite');
        $this->addSql('DROP TABLE personnel');
        $this->addSql('DROP TABLE personnel_activite');
        $this->addSql('DROP TABLE soucription_client_offre');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, nom_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mail_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mot_de_passe_client VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_C74404554DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE inscription_client_activite (id INT AUTO_INCREMENT NOT NULL, inscription_client_id INT NOT NULL, inscription_activite_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_50F1D8E2BFFEAB39 (inscription_client_id), INDEX IDX_50F1D8E26C7E1561 (inscription_activite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, role_personnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom_personnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom_personnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mail_personnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mot_de_passe_personnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE personnel_activite (personnel_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_13044E501C109075 (personnel_id), INDEX IDX_13044E509B0F88B1 (activite_id), PRIMARY KEY(personnel_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE soucription_client_offre (id INT AUTO_INCREMENT NOT NULL, offre_id INT NOT NULL, client_id INT NOT NULL, debut_souscription DATETIME NOT NULL, fin_souscription DATETIME NOT NULL, INDEX IDX_171086494CC8505A (offre_id), INDEX IDX_1710864919EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404554DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE inscription_client_activite ADD CONSTRAINT FK_50F1D8E2BFFEAB39 FOREIGN KEY (inscription_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE inscription_client_activite ADD CONSTRAINT FK_50F1D8E26C7E1561 FOREIGN KEY (inscription_activite_id) REFERENCES activite (id)');
        $this->addSql('ALTER TABLE personnel_activite ADD CONSTRAINT FK_13044E501C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnel_activite ADD CONSTRAINT FK_13044E509B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE soucription_client_offre ADD CONSTRAINT FK_1710864919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE soucription_client_offre ADD CONSTRAINT FK_171086494CC8505A FOREIGN KEY (offre_id) REFERENCES offre (id)');
    }
}
