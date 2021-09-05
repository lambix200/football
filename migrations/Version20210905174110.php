<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210905174110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE composition_equipe (id INT AUTO_INCREMENT NOT NULL, equipe_id INT NOT NULL, saison_id INT NOT NULL, INDEX IDX_E44EA6056D861B89 (equipe_id), INDEX IDX_E44EA605F965414C (saison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE composition_equipe_joueur (composition_equipe_id INT NOT NULL, joueur_id INT NOT NULL, INDEX IDX_27E1A3559B370C7 (composition_equipe_id), INDEX IDX_27E1A355A9E2D76C (joueur_id), PRIMARY KEY(composition_equipe_id, joueur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, annee DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistiques (id INT AUTO_INCREMENT NOT NULL, joueur_id INT NOT NULL, saison_id INT NOT NULL, matchs INT DEFAULT NULL, minutes INT NOT NULL, passes_decisives INT DEFAULT NULL, buts INT DEFAULT NULL, UNIQUE INDEX UNIQ_B31AB066A9E2D76C (joueur_id), UNIQUE INDEX UNIQ_B31AB066F965414C (saison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE composition_equipe ADD CONSTRAINT FK_E44EA6056D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE composition_equipe ADD CONSTRAINT FK_E44EA605F965414C FOREIGN KEY (saison_id) REFERENCES saison (id)');
        $this->addSql('ALTER TABLE composition_equipe_joueur ADD CONSTRAINT FK_27E1A3559B370C7 FOREIGN KEY (composition_equipe_id) REFERENCES composition_equipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE composition_equipe_joueur ADD CONSTRAINT FK_27E1A355A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE statistiques ADD CONSTRAINT FK_B31AB066A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (id)');
        $this->addSql('ALTER TABLE statistiques ADD CONSTRAINT FK_B31AB066F965414C FOREIGN KEY (saison_id) REFERENCES saison (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE composition_equipe_joueur DROP FOREIGN KEY FK_27E1A3559B370C7');
        $this->addSql('ALTER TABLE composition_equipe DROP FOREIGN KEY FK_E44EA6056D861B89');
        $this->addSql('ALTER TABLE composition_equipe_joueur DROP FOREIGN KEY FK_27E1A355A9E2D76C');
        $this->addSql('ALTER TABLE statistiques DROP FOREIGN KEY FK_B31AB066A9E2D76C');
        $this->addSql('ALTER TABLE composition_equipe DROP FOREIGN KEY FK_E44EA605F965414C');
        $this->addSql('ALTER TABLE statistiques DROP FOREIGN KEY FK_B31AB066F965414C');
        $this->addSql('DROP TABLE composition_equipe');
        $this->addSql('DROP TABLE composition_equipe_joueur');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE statistiques');
    }
}
