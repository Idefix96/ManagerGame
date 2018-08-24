<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180804111646 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Players_rel_Positions (player_position_id INT NOT NULL, positionId INT NOT NULL, INDEX IDX_FCEA5B7BE4113647 (positionId), INDEX IDX_FCEA5B7B85B3C7D3 (player_position_id), PRIMARY KEY(positionId, player_position_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Players_rel_Positions ADD CONSTRAINT FK_FCEA5B7BE4113647 FOREIGN KEY (positionId) REFERENCES player (id)');
        $this->addSql('ALTER TABLE Players_rel_Positions ADD CONSTRAINT FK_FCEA5B7B85B3C7D3 FOREIGN KEY (player_position_id) REFERENCES player_position (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player DROP position');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE Players_rel_Positions');
        $this->addSql('ALTER TABLE player ADD position INT NOT NULL');
    }
}
