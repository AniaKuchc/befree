<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230117141956 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription_clients_activite (id INT AUTO_INCREMENT NOT NULL, clients_id INT NOT NULL, activites_id INT NOT NULL, inscription_activite_client DATETIME NOT NULL, INDEX IDX_E0E51019AB014612 (clients_id), INDEX IDX_E0E510195B8C31B7 (activites_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inscription_clients_activite ADD CONSTRAINT FK_E0E51019AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE inscription_clients_activite ADD CONSTRAINT FK_E0E510195B8C31B7 FOREIGN KEY (activites_id) REFERENCES activite (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_clients_activite DROP FOREIGN KEY FK_E0E51019AB014612');
        $this->addSql('ALTER TABLE inscription_clients_activite DROP FOREIGN KEY FK_E0E510195B8C31B7');
        $this->addSql('DROP TABLE inscription_clients_activite');
    }
}
