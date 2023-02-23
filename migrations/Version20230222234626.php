<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222234626 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achat (id INT AUTO_INCREMENT NOT NULL, facture_id INT DEFAULT NULL, membre_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, nbr_piece INT NOT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_26A984567F2DEE08 (facture_id), INDEX IDX_26A984566A99F74A (membre_id), INDEX IDX_26A98456F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, date_nais DATE NOT NULL, tel VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE affectations (id INT AUTO_INCREMENT NOT NULL, technicien_id INT DEFAULT NULL, terrain_id INT DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_420910413457256 (technicien_id), INDEX IDX_42091048A2D8B41 (terrain_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, rib INT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, membre_id INT DEFAULT NULL, text LONGTEXT NOT NULL, date DATE NOT NULL, INDEX IDX_67F068BC4B89032C (post_id), INDEX IDX_67F068BC6A99F74A (membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don (id INT AUTO_INCREMENT NOT NULL, membre_id INT DEFAULT NULL, association_id INT DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, date_don DATE NOT NULL, INDEX IDX_F8F081D96A99F74A (membre_id), INDEX IDX_F8F081D9EFB9C8A5 (association_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, membre_id INT DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, date DATE NOT NULL, INDEX IDX_FE8664106A99F74A (membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE frais_energie (id INT AUTO_INCREMENT NOT NULL, membre_id INT DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, taux_energie DOUBLE PRECISION NOT NULL, date DATE NOT NULL, INDEX IDX_2F78218C6A99F74A (membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, date_nais DATE NOT NULL, tel VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE part (id INT AUTO_INCREMENT NOT NULL, id_terrain_id INT DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, date DATE NOT NULL, INDEX IDX_490F70C62FA70B96 (id_terrain_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, date_nais DATE NOT NULL, tel VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, cin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, membre_id INT DEFAULT NULL, theme VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, nbr_vue INT NOT NULL, date_creation DATE NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_5A8A6C8D6A99F74A (membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, nom_prod VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(1000) NOT NULL, prix DOUBLE PRECISION NOT NULL, nbr_prods INT NOT NULL, INDEX IDX_29A5EC27BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technicien (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, salaire DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE terrain (id INT AUTO_INCREMENT NOT NULL, membre_id INT DEFAULT NULL, surface DOUBLE PRECISION NOT NULL, adresse VARCHAR(255) NOT NULL, potentiel DOUBLE PRECISION NOT NULL, INDEX IDX_C87653B16A99F74A (membre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A984567F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A984566A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A98456F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE affectations ADD CONSTRAINT FK_420910413457256 FOREIGN KEY (technicien_id) REFERENCES technicien (id)');
        $this->addSql('ALTER TABLE affectations ADD CONSTRAINT FK_42091048A2D8B41 FOREIGN KEY (terrain_id) REFERENCES terrain (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC4B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT FK_F8F081D96A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT FK_F8F081D9EFB9C8A5 FOREIGN KEY (association_id) REFERENCES association (id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE8664106A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE frais_energie ADD CONSTRAINT FK_2F78218C6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE part ADD CONSTRAINT FK_490F70C62FA70B96 FOREIGN KEY (id_terrain_id) REFERENCES terrain (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE terrain ADD CONSTRAINT FK_C87653B16A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A984567F2DEE08');
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A984566A99F74A');
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A98456F347EFB');
        $this->addSql('ALTER TABLE affectations DROP FOREIGN KEY FK_420910413457256');
        $this->addSql('ALTER TABLE affectations DROP FOREIGN KEY FK_42091048A2D8B41');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC4B89032C');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC6A99F74A');
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY FK_F8F081D96A99F74A');
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY FK_F8F081D9EFB9C8A5');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE8664106A99F74A');
        $this->addSql('ALTER TABLE frais_energie DROP FOREIGN KEY FK_2F78218C6A99F74A');
        $this->addSql('ALTER TABLE part DROP FOREIGN KEY FK_490F70C62FA70B96');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D6A99F74A');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE terrain DROP FOREIGN KEY FK_C87653B16A99F74A');
        $this->addSql('DROP TABLE achat');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE affectations');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE don');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE frais_energie');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE part');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE technicien');
        $this->addSql('DROP TABLE terrain');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
