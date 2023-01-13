<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113104544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscription_client_activite (id INT AUTO_INCREMENT NOT NULL, inscription_client_id INT NOT NULL, inscription_activite_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_50F1D8E2BFFEAB39 (inscription_client_id), INDEX IDX_50F1D8E26C7E1561 (inscription_activite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inscription_client_activite ADD CONSTRAINT FK_50F1D8E2BFFEAB39 FOREIGN KEY (inscription_client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE inscription_client_activite ADD CONSTRAINT FK_50F1D8E26C7E1561 FOREIGN KEY (inscription_activite_id) REFERENCES activite (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_client_activite DROP FOREIGN KEY FK_50F1D8E2BFFEAB39');
        $this->addSql('ALTER TABLE inscription_client_activite DROP FOREIGN KEY FK_50F1D8E26C7E1561');
        $this->addSql('DROP TABLE inscription_client_activite');
    }
}
