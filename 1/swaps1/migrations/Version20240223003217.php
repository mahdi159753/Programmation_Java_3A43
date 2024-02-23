<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240223003217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE discussion (ID_discussion INT AUTO_INCREMENT NOT NULL, titre_discussion VARCHAR(100) NOT NULL, contenu_discussion VARCHAR(2000) NOT NULL, image_discussion VARCHAR(255) DEFAULT NULL, date_discussion DATE NOT NULL, ID_user INT DEFAULT NULL, INDEX fk_discussion_utilisateur (ID_user), PRIMARY KEY(ID_discussion)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (ID_reponse INT AUTO_INCREMENT NOT NULL, contenu_reponse VARCHAR(500) NOT NULL, date_reponse DATE NOT NULL, ID_discussion INT DEFAULT NULL, ID_user INT DEFAULT NULL, INDEX fk_reponse_discussion (ID_discussion), INDEX fk_reponse_utilisateur (ID_user), PRIMARY KEY(ID_reponse)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (ID_user INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(ID_user)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90FCEA2F6E1 FOREIGN KEY (ID_user) REFERENCES utilisateurs (ID_user)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7CE7CE9D5 FOREIGN KEY (ID_discussion) REFERENCES discussion (ID_discussion)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7CEA2F6E1 FOREIGN KEY (ID_user) REFERENCES utilisateurs (ID_user)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE discussion DROP FOREIGN KEY FK_C0B9F90FCEA2F6E1');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7CE7CE9D5');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7CEA2F6E1');
        $this->addSql('DROP TABLE discussion');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
