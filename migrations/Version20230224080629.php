<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230224080629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activities_history (id INT AUTO_INCREMENT NOT NULL, activities_id INT NOT NULL, account_id INT NOT NULL, INDEX IDX_2FC8546C2A4DB562 (activities_id), INDEX IDX_2FC8546C9B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activities_history ADD CONSTRAINT FK_2FC8546C2A4DB562 FOREIGN KEY (activities_id) REFERENCES activities (id)');
        $this->addSql('ALTER TABLE activities_history ADD CONSTRAINT FK_2FC8546C9B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activities_history DROP FOREIGN KEY FK_2FC8546C2A4DB562');
        $this->addSql('ALTER TABLE activities_history DROP FOREIGN KEY FK_2FC8546C9B6B5FBA');
        $this->addSql('DROP TABLE activities_history');
    }
}
