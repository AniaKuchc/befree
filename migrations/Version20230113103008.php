<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230113103008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personnel_activite (personnel_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_13044E501C109075 (personnel_id), INDEX IDX_13044E509B0F88B1 (activite_id), PRIMARY KEY(personnel_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnel_activite ADD CONSTRAINT FK_13044E501C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnel_activite ADD CONSTRAINT FK_13044E509B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personnel_activite DROP FOREIGN KEY FK_13044E501C109075');
        $this->addSql('ALTER TABLE personnel_activite DROP FOREIGN KEY FK_13044E509B0F88B1');
        $this->addSql('DROP TABLE personnel_activite');
    }
}
