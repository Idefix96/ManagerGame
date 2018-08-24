<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180804205204 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE player_player_position (player_id INT NOT NULL, player_position_id INT NOT NULL, INDEX IDX_99E1265E99E6F5DF (player_id), INDEX IDX_99E1265E85B3C7D3 (player_position_id), PRIMARY KEY(player_id, player_position_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_player_position ADD CONSTRAINT FK_99E1265E99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_player_position ADD CONSTRAINT FK_99E1265E85B3C7D3 FOREIGN KEY (player_position_id) REFERENCES player_position (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE Players_rel_Positions');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Players_rel_Positions (player_position_id INT NOT NULL, positionId INT NOT NULL, INDEX IDX_FCEA5B7B85B3C7D3 (player_position_id), INDEX IDX_FCEA5B7BE4113647 (positionId), PRIMARY KEY(positionId, player_position_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Players_rel_Positions ADD CONSTRAINT FK_FCEA5B7B85B3C7D3 FOREIGN KEY (player_position_id) REFERENCES player_position (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Players_rel_Positions ADD CONSTRAINT FK_FCEA5B7BE4113647 FOREIGN KEY (positionId) REFERENCES player (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE player_player_position');
    }
}
