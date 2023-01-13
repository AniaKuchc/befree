<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113103802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite ADD activite_adresse_id INT DEFAULT NULL, ADD activite_offre_id INT NOT NULL');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B875551511174229 FOREIGN KEY (activite_adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515D1508132 FOREIGN KEY (activite_offre_id) REFERENCES offre (id)');
        $this->addSql('CREATE INDEX IDX_B875551511174229 ON activite (activite_adresse_id)');
        $this->addSql('CREATE INDEX IDX_B8755515D1508132 ON activite (activite_offre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B875551511174229');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515D1508132');
        $this->addSql('DROP INDEX IDX_B875551511174229 ON activite');
        $this->addSql('DROP INDEX IDX_B8755515D1508132 ON activite');
        $this->addSql('ALTER TABLE activite DROP activite_adresse_id, DROP activite_offre_id');
    }
}
