<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221171707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, account_id_id INT NOT NULL, club_id_id INT NOT NULL, member_role SMALLINT NOT NULL, image VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_70E4FA7849CB4726 (account_id_id), INDEX IDX_70E4FA78DF2AB4E5 (club_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA7849CB4726 FOREIGN KEY (account_id_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78DF2AB4E5 FOREIGN KEY (club_id_id) REFERENCES clubs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA7849CB4726');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78DF2AB4E5');
        $this->addSql('DROP TABLE member');
    }
}
