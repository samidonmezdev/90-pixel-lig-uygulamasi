<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617225722 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maclar (id INT AUTO_INCREMENT NOT NULL, takim1_id INT NOT NULL, takim2_id INT DEFAULT NULL, t1gol INT DEFAULT NULL, t2gol INT DEFAULT NULL, hafta INT DEFAULT NULL, INDEX IDX_B49C385417850C5 (takim1_id), INDEX IDX_B49C38553CDFF2B (takim2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE takimlar (id INT AUTO_INCREMENT NOT NULL, ad VARCHAR(255) NOT NULL, atilangol INT DEFAULT NULL, yenilengol INT DEFAULT NULL, galibiyet INT DEFAULT NULL, maglubiyet INT DEFAULT NULL, beraberlik INT DEFAULT NULL, hafta INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE maclar ADD CONSTRAINT FK_B49C385417850C5 FOREIGN KEY (takim1_id) REFERENCES takimlar (id)');
        $this->addSql('ALTER TABLE maclar ADD CONSTRAINT FK_B49C38553CDFF2B FOREIGN KEY (takim2_id) REFERENCES takimlar (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE maclar DROP FOREIGN KEY FK_B49C385417850C5');
        $this->addSql('ALTER TABLE maclar DROP FOREIGN KEY FK_B49C38553CDFF2B');
        $this->addSql('DROP TABLE maclar');
        $this->addSql('DROP TABLE takimlar');
    }
}
