<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150718223236 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE participants ADD bet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE participants ADD CONSTRAINT FK_71697092D871DC26 FOREIGN KEY (bet_id) REFERENCES bets (id)');
        $this->addSql('CREATE INDEX IDX_71697092D871DC26 ON participants (bet_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE participants DROP FOREIGN KEY FK_71697092D871DC26');
        $this->addSql('DROP INDEX IDX_71697092D871DC26 ON participants');
        $this->addSql('ALTER TABLE participants DROP bet_id');
    }
}
