<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230116145923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite CHANGE activite_randonnee_id activite_randonnee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestataire CHANGE geopoint_prestataire geopoint_prestataire VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite CHANGE activite_randonnee_id activite_randonnee_id INT NOT NULL');
        $this->addSql('ALTER TABLE prestataire CHANGE geopoint_prestataire geopoint_prestataire VARCHAR(255) NOT NULL');
    }
}
