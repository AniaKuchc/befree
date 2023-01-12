<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230112145148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prestataire (id INT AUTO_INCREMENT NOT NULL, nom_prestataire VARCHAR(255) NOT NULL, description_prestataire VARCHAR(255) DEFAULT NULL, insee_prestataire INT DEFAULT NULL, ville_prestataire VARCHAR(255) DEFAULT NULL, geopoint_prestataire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire_type_prestataire (prestataire_id INT NOT NULL, type_prestataire_id INT NOT NULL, INDEX IDX_379F3CD0BE3DB2B7 (prestataire_id), INDEX IDX_379F3CD0E8FE9B23 (type_prestataire_id), PRIMARY KEY(prestataire_id, type_prestataire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestataire_type_prestataire ADD CONSTRAINT FK_379F3CD0BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_type_prestataire ADD CONSTRAINT FK_379F3CD0E8FE9B23 FOREIGN KEY (type_prestataire_id) REFERENCES type_prestataire (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestataire_type_prestataire DROP FOREIGN KEY FK_379F3CD0BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire_type_prestataire DROP FOREIGN KEY FK_379F3CD0E8FE9B23');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE prestataire_type_prestataire');
    }
}
