<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191201173156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE banca (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orgao (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questao (id INT AUTO_INCREMENT NOT NULL, assunto_id INT DEFAULT NULL, banca_id INT DEFAULT NULL, orgao_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, INDEX IDX_56D7897F4CE74285 (assunto_id), INDEX IDX_56D7897F2CDBD00D (banca_id), INDEX IDX_56D7897F5CF83614 (orgao_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE assunto (id INT AUTO_INCREMENT NOT NULL, assunto_pai_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, INDEX IDX_B9F0BE0D59FD0A3 (assunto_pai_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE questao ADD CONSTRAINT FK_56D7897F4CE74285 FOREIGN KEY (assunto_id) REFERENCES assunto (id)');
        $this->addSql('ALTER TABLE questao ADD CONSTRAINT FK_56D7897F2CDBD00D FOREIGN KEY (banca_id) REFERENCES banca (id)');
        $this->addSql('ALTER TABLE questao ADD CONSTRAINT FK_56D7897F5CF83614 FOREIGN KEY (orgao_id) REFERENCES orgao (id)');
        $this->addSql('ALTER TABLE assunto ADD CONSTRAINT FK_B9F0BE0D59FD0A3 FOREIGN KEY (assunto_pai_id) REFERENCES assunto (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE questao DROP FOREIGN KEY FK_56D7897F2CDBD00D');
        $this->addSql('ALTER TABLE questao DROP FOREIGN KEY FK_56D7897F5CF83614');
        $this->addSql('ALTER TABLE questao DROP FOREIGN KEY FK_56D7897F4CE74285');
        $this->addSql('ALTER TABLE assunto DROP FOREIGN KEY FK_B9F0BE0D59FD0A3');
        $this->addSql('DROP TABLE banca');
        $this->addSql('DROP TABLE orgao');
        $this->addSql('DROP TABLE questao');
        $this->addSql('DROP TABLE assunto');
    }
}
