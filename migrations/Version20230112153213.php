<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230112153213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE catalogue_randonnee (id INT AUTO_INCREMENT NOT NULL, date_proposed_rando DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE randonnee (id INT AUTO_INCREMENT NOT NULL, catalogue_randonnees_id INT NOT NULL, nom_randonnee VARCHAR(255) NOT NULL, ville_randonnee VARCHAR(255) NOT NULL, type_randonnee VARCHAR(255) DEFAULT NULL, geometry_randonnee VARCHAR(255) NOT NULL, geopoint_randonnee VARCHAR(255) DEFAULT NULL, INDEX IDX_CB71A99F8DF90146 (catalogue_randonnees_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_activite (id INT AUTO_INCREMENT NOT NULL, nom_type_activite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE randonnee ADD CONSTRAINT FK_CB71A99F8DF90146 FOREIGN KEY (catalogue_randonnees_id) REFERENCES catalogue_randonnee (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE randonnee DROP FOREIGN KEY FK_CB71A99F8DF90146');
        $this->addSql('DROP TABLE catalogue_randonnee');
        $this->addSql('DROP TABLE randonnee');
        $this->addSql('DROP TABLE type_activite');
    }
}
