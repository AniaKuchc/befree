<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230117141413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personnels_activite (personnels_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_C5C9372FC7022806 (personnels_id), INDEX IDX_C5C9372F9B0F88B1 (activite_id), PRIMARY KEY(personnels_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnels_activite ADD CONSTRAINT FK_C5C9372FC7022806 FOREIGN KEY (personnels_id) REFERENCES personnels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnels_activite ADD CONSTRAINT FK_C5C9372F9B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnels_activite DROP FOREIGN KEY FK_C5C9372FC7022806');
        $this->addSql('ALTER TABLE personnels_activite DROP FOREIGN KEY FK_C5C9372F9B0F88B1');
        $this->addSql('DROP TABLE personnels_activite');
    }
}
