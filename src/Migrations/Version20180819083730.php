<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180819083730 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE player ADD currentClub INT DEFAULT NULL, DROP current_club');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A655C4B7180 FOREIGN KEY (currentClub) REFERENCES club (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_98197A655C4B7180 ON player (currentClub)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A655C4B7180');
        $this->addSql('DROP INDEX UNIQ_98197A655C4B7180 ON player');
        $this->addSql('ALTER TABLE player ADD current_club VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP currentClub');
    }
}
