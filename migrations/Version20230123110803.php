<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230123110803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E744DE7DC5C');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E744DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inscription_clients_activite ADD CONSTRAINT FK_E0E51019AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE inscription_clients_activite ADD CONSTRAINT FK_E0E510195B8C31B7 FOREIGN KEY (activites_id) REFERENCES activite (id)');
        $this->addSql('ALTER TABLE personnels_activite ADD CONSTRAINT FK_C5C9372FC7022806 FOREIGN KEY (personnels_id) REFERENCES personnels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnels_activite ADD CONSTRAINT FK_C5C9372F9B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_type_prestataire ADD CONSTRAINT FK_379F3CD0BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_type_prestataire ADD CONSTRAINT FK_379F3CD0E8FE9B23 FOREIGN KEY (type_prestataire_id) REFERENCES type_prestataire (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription_clients_activite DROP FOREIGN KEY FK_E0E51019AB014612');
        $this->addSql('ALTER TABLE inscription_clients_activite DROP FOREIGN KEY FK_E0E510195B8C31B7');
        $this->addSql('ALTER TABLE prestataire_type_prestataire DROP FOREIGN KEY FK_379F3CD0BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire_type_prestataire DROP FOREIGN KEY FK_379F3CD0E8FE9B23');
        $this->addSql('ALTER TABLE personnels_activite DROP FOREIGN KEY FK_C5C9372FC7022806');
        $this->addSql('ALTER TABLE personnels_activite DROP FOREIGN KEY FK_C5C9372F9B0F88B1');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E744DE7DC5C');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E744DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
