<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230223053325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activities ADD club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activities ADD CONSTRAINT FK_B5F1AFE561190A32 FOREIGN KEY (club_id) REFERENCES clubs (id)');
        $this->addSql('CREATE INDEX IDX_B5F1AFE561190A32 ON activities (club_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activities DROP FOREIGN KEY FK_B5F1AFE561190A32');
        $this->addSql('DROP INDEX IDX_B5F1AFE561190A32 ON activities');
        $this->addSql('ALTER TABLE activities DROP club_id');
    }
}
