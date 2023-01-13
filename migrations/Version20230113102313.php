<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113102313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, activite_prestataire_id INT NOT NULL, activite_type_id INT NOT NULL, activite_randonnee_id INT NOT NULL, nom_activite VARCHAR(255) NOT NULL, description_activite VARCHAR(255) NOT NULL, date_activite DATETIME NOT NULL, place_maximum INT NOT NULL, afficher_activite TINYINT(1) NOT NULL, INDEX IDX_B875551563308B81 (activite_prestataire_id), INDEX IDX_B87555158FEA4B16 (activite_type_id), INDEX IDX_B87555158D36133C (activite_randonnee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B875551563308B81 FOREIGN KEY (activite_prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B87555158FEA4B16 FOREIGN KEY (activite_type_id) REFERENCES type_activite (id)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B87555158D36133C FOREIGN KEY (activite_randonnee_id) REFERENCES randonnee (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B875551563308B81');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B87555158FEA4B16');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B87555158D36133C');
        $this->addSql('DROP TABLE activite');
    }
}
