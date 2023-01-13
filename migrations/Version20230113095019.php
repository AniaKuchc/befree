<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113095019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD adresse_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404554DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('CREATE INDEX IDX_C74404554DE7DC5C ON client (adresse_id)');
        $this->addSql('ALTER TABLE soucription_client_offre ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE soucription_client_offre ADD CONSTRAINT FK_1710864919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_1710864919EB6921 ON soucription_client_offre (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404554DE7DC5C');
        $this->addSql('DROP INDEX IDX_C74404554DE7DC5C ON client');
        $this->addSql('ALTER TABLE client DROP adresse_id');
        $this->addSql('ALTER TABLE soucription_client_offre DROP FOREIGN KEY FK_1710864919EB6921');
        $this->addSql('DROP INDEX IDX_1710864919EB6921 ON soucription_client_offre');
        $this->addSql('ALTER TABLE soucription_client_offre DROP client_id');
    }
}
