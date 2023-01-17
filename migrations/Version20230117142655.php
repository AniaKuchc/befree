<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230117142655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE souscription_client_offre (id INT AUTO_INCREMENT NOT NULL, offres_id INT NOT NULL, clients_id INT NOT NULL, fin_souscription DATETIME NOT NULL, debut_souscription DATETIME NOT NULL, INDEX IDX_612B97216C83CD9F (offres_id), INDEX IDX_612B9721AB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE souscription_client_offre ADD CONSTRAINT FK_612B97216C83CD9F FOREIGN KEY (offres_id) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE souscription_client_offre ADD CONSTRAINT FK_612B9721AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE souscription_client_offre DROP FOREIGN KEY FK_612B97216C83CD9F');
        $this->addSql('ALTER TABLE souscription_client_offre DROP FOREIGN KEY FK_612B9721AB014612');
        $this->addSql('DROP TABLE souscription_client_offre');
    }
}
