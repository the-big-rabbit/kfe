<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200714105313 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, type_id INT NOT NULL, slug VARCHAR(128) NOT NULL, name VARCHAR(255) NOT NULL, prio INT DEFAULT NULL, active TINYINT(1) NOT NULL, remove TINYINT(1) NOT NULL, creation_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_140AB620989D9B62 (slug), INDEX IDX_140AB620727ACA70 (parent_id), INDEX IDX_140AB620C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_url (id INT AUTO_INCREMENT NOT NULL, page_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, lang VARCHAR(255) NOT NULL, INDEX IDX_38C94D3FC4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_detail (id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, h1 VARCHAR(255) DEFAULT NULL, meta_title VARCHAR(255) DEFAULT NULL, meta_desc LONGTEXT DEFAULT NULL, meta_keys LONGTEXT DEFAULT NULL, lang VARCHAR(2) NOT NULL, name VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_41D0898D989D9B62 (slug), INDEX IDX_41D0898DC4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(191) NOT NULL, title VARCHAR(255) NOT NULL, remove TINYINT(1) NOT NULL, removable TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_B1A4BF35E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, price DOUBLE PRECISION DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, prio INT DEFAULT NULL, active TINYINT(1) NOT NULL, remove TINYINT(1) NOT NULL, creation_date DATETIME NOT NULL, INDEX IDX_41405E39C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element_url (id INT AUTO_INCREMENT NOT NULL, element_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, lang VARCHAR(255) NOT NULL, INDEX IDX_A3BED6C61F1F2A24 (element_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element_detail (id INT AUTO_INCREMENT NOT NULL, element_id INT NOT NULL, h1 VARCHAR(255) DEFAULT NULL, meta_title VARCHAR(255) DEFAULT NULL, meta_desc LONGTEXT DEFAULT NULL, meta_keys LONGTEXT DEFAULT NULL, lang VARCHAR(2) NOT NULL, name VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_A7117607989D9B62 (slug), INDEX IDX_A71176071F1F2A24 (element_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element_type (id INT AUTO_INCREMENT NOT NULL, page_id INT DEFAULT NULL, prio INT DEFAULT NULL, name VARCHAR(191) NOT NULL, title VARCHAR(255) NOT NULL, remove TINYINT(1) NOT NULL, removable TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_CFE076D05E237E06 (name), INDEX IDX_CFE076D0C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone (id INT AUTO_INCREMENT NOT NULL, page_id INT DEFAULT NULL, type_id INT NOT NULL, element_id INT DEFAULT NULL, page_link_id INT DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, sub_type VARCHAR(255) NOT NULL, type_head INT NOT NULL, name VARCHAR(255) NOT NULL, prio INT DEFAULT NULL, active TINYINT(1) NOT NULL, remove TINYINT(1) NOT NULL, creation_date DATETIME NOT NULL, INDEX IDX_A0EBC007C4663E4 (page_id), INDEX IDX_A0EBC007C54C8C93 (type_id), INDEX IDX_A0EBC0071F1F2A24 (element_id), INDEX IDX_A0EBC00757C4E9E4 (page_link_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone_page (zone_id INT NOT NULL, page_id INT NOT NULL, INDEX IDX_86F277859F2C3FAB (zone_id), INDEX IDX_86F27785C4663E4 (page_id), PRIMARY KEY(zone_id, page_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone_detail (id INT AUTO_INCREMENT NOT NULL, zone_id INT NOT NULL, title2 VARCHAR(255) DEFAULT NULL, description2 LONGTEXT DEFAULT NULL, title3 VARCHAR(255) DEFAULT NULL, description3 LONGTEXT DEFAULT NULL, title4 VARCHAR(255) DEFAULT NULL, description4 LONGTEXT DEFAULT NULL, lang VARCHAR(2) NOT NULL, name VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_111557E1989D9B62 (slug), INDEX IDX_111557E19F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zone_type (id INT AUTO_INCREMENT NOT NULL, codex_hash VARCHAR(255) DEFAULT NULL, codex_id INT DEFAULT NULL, version INT DEFAULT NULL, name VARCHAR(191) NOT NULL, title VARCHAR(255) NOT NULL, remove TINYINT(1) NOT NULL, removable TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1E26968C5E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partner (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, prio INT DEFAULT NULL, active TINYINT(1) NOT NULL, remove TINYINT(1) NOT NULL, creation_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partner_detail (id INT AUTO_INCREMENT NOT NULL, partner_id INT NOT NULL, lang VARCHAR(2) NOT NULL, name VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_13CDD6E8989D9B62 (slug), INDEX IDX_13CDD6E89393F8FE (partner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, file VARCHAR(255) NOT NULL, date DATETIME NOT NULL, ext VARCHAR(5) NOT NULL, original_name VARCHAR(255) NOT NULL, remove VARCHAR(255) NOT NULL, INDEX IDX_8C9F3610C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(191) NOT NULL, title VARCHAR(255) NOT NULL, remove TINYINT(1) NOT NULL, removable TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_5223F475E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, file_id INT NOT NULL, page_id INT DEFAULT NULL, zone_id INT DEFAULT NULL, element_id INT DEFAULT NULL, partner_id INT DEFAULT NULL, video_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, prio INT DEFAULT NULL, active TINYINT(1) NOT NULL, remove TINYINT(1) NOT NULL, creation_date DATETIME NOT NULL, INDEX IDX_14B7841893CB796C (file_id), INDEX IDX_14B78418C4663E4 (page_id), INDEX IDX_14B784189F2C3FAB (zone_id), INDEX IDX_14B784181F1F2A24 (element_id), INDEX IDX_14B784189393F8FE (partner_id), INDEX IDX_14B7841829C1004E (video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_detail (id INT AUTO_INCREMENT NOT NULL, photo_id INT NOT NULL, lang VARCHAR(2) NOT NULL, name VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_7BB908BB989D9B62 (slug), INDEX IDX_7BB908BB7E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, file_id INT NOT NULL, page_id INT DEFAULT NULL, zone_id INT DEFAULT NULL, element_id INT DEFAULT NULL, partner_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, prio INT DEFAULT NULL, active TINYINT(1) NOT NULL, remove TINYINT(1) NOT NULL, creation_date DATETIME NOT NULL, INDEX IDX_D8698A7693CB796C (file_id), INDEX IDX_D8698A76C4663E4 (page_id), INDEX IDX_D8698A769F2C3FAB (zone_id), INDEX IDX_D8698A761F1F2A24 (element_id), INDEX IDX_D8698A769393F8FE (partner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_detail (id INT AUTO_INCREMENT NOT NULL, document_id INT NOT NULL, lang VARCHAR(2) NOT NULL, name VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_9064CEF5989D9B62 (slug), INDEX IDX_9064CEF5C33F7837 (document_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, file_id INT NOT NULL, page_id INT DEFAULT NULL, zone_id INT DEFAULT NULL, element_id INT DEFAULT NULL, partner_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, prio INT DEFAULT NULL, active TINYINT(1) NOT NULL, remove TINYINT(1) NOT NULL, creation_date DATETIME NOT NULL, INDEX IDX_7CC7DA2C93CB796C (file_id), INDEX IDX_7CC7DA2CC4663E4 (page_id), INDEX IDX_7CC7DA2C9F2C3FAB (zone_id), INDEX IDX_7CC7DA2C1F1F2A24 (element_id), INDEX IDX_7CC7DA2C9393F8FE (partner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_detail (id INT AUTO_INCREMENT NOT NULL, video_id INT NOT NULL, lang VARCHAR(2) NOT NULL, name VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_1651DF5E989D9B62 (slug), INDEX IDX_1651DF5E29C1004E (video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infos (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, cp VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, siret VARCHAR(255) DEFAULT NULL, code_ape VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, mobile VARCHAR(255) DEFAULT NULL, gmap LONGTEXT DEFAULT NULL, facebook LONGTEXT DEFAULT NULL, twitter LONGTEXT DEFAULT NULL, insta LONGTEXT DEFAULT NULL, resa LONGTEXT DEFAULT NULL, analytics_id LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', password VARCHAR(255) NOT NULL, firstname VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, api_token VARCHAR(255) DEFAULT NULL, enable TINYINT(1) NOT NULL, last_login DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE field_detail (id INT AUTO_INCREMENT NOT NULL, field_id INT NOT NULL, placeholder VARCHAR(255) DEFAULT NULL, label VARCHAR(255) DEFAULT NULL, error VARCHAR(255) DEFAULT NULL, INDEX IDX_442F391443707B0 (field_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE field (id INT AUTO_INCREMENT NOT NULL, form_id INT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_5BF545585FF69B7D (form_id), INDEX IDX_5BF54558727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form_zone (form_id INT NOT NULL, zone_id INT NOT NULL, INDEX IDX_34CAC4105FF69B7D (form_id), INDEX IDX_34CAC4109F2C3FAB (zone_id), PRIMARY KEY(form_id, zone_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620727ACA70 FOREIGN KEY (parent_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE page ADD CONSTRAINT FK_140AB620C54C8C93 FOREIGN KEY (type_id) REFERENCES page_type (id)');
        $this->addSql('ALTER TABLE page_url ADD CONSTRAINT FK_38C94D3FC4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE page_detail ADD CONSTRAINT FK_41D0898DC4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE element ADD CONSTRAINT FK_41405E39C54C8C93 FOREIGN KEY (type_id) REFERENCES element_type (id)');
        $this->addSql('ALTER TABLE element_url ADD CONSTRAINT FK_A3BED6C61F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE element_detail ADD CONSTRAINT FK_A71176071F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE element_type ADD CONSTRAINT FK_CFE076D0C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007C54C8C93 FOREIGN KEY (type_id) REFERENCES zone_type (id)');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC0071F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC00757C4E9E4 FOREIGN KEY (page_link_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE zone_page ADD CONSTRAINT FK_86F277859F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE zone_page ADD CONSTRAINT FK_86F27785C4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE zone_detail ADD CONSTRAINT FK_111557E19F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE partner_detail ADD CONSTRAINT FK_13CDD6E89393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610C54C8C93 FOREIGN KEY (type_id) REFERENCES file_type (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841893CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784189F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784181F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784189393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841829C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
        $this->addSql('ALTER TABLE photo_detail ADD CONSTRAINT FK_7BB908BB7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7693CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A769F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A761F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A769393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE document_detail ADD CONSTRAINT FK_9064CEF5C33F7837 FOREIGN KEY (document_id) REFERENCES document (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C93CB796C FOREIGN KEY (file_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CC4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C9F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C1F1F2A24 FOREIGN KEY (element_id) REFERENCES element (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C9393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE video_detail ADD CONSTRAINT FK_1651DF5E29C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
        $this->addSql('ALTER TABLE field_detail ADD CONSTRAINT FK_442F391443707B0 FOREIGN KEY (field_id) REFERENCES field (id)');
        $this->addSql('ALTER TABLE field ADD CONSTRAINT FK_5BF545585FF69B7D FOREIGN KEY (form_id) REFERENCES form (id)');
        $this->addSql('ALTER TABLE field ADD CONSTRAINT FK_5BF54558727ACA70 FOREIGN KEY (parent_id) REFERENCES field (id)');
        $this->addSql('ALTER TABLE form_zone ADD CONSTRAINT FK_34CAC4105FF69B7D FOREIGN KEY (form_id) REFERENCES form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE form_zone ADD CONSTRAINT FK_34CAC4109F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620727ACA70');
        $this->addSql('ALTER TABLE page_url DROP FOREIGN KEY FK_38C94D3FC4663E4');
        $this->addSql('ALTER TABLE page_detail DROP FOREIGN KEY FK_41D0898DC4663E4');
        $this->addSql('ALTER TABLE element_type DROP FOREIGN KEY FK_CFE076D0C4663E4');
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC007C4663E4');
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC00757C4E9E4');
        $this->addSql('ALTER TABLE zone_page DROP FOREIGN KEY FK_86F27785C4663E4');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418C4663E4');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76C4663E4');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CC4663E4');
        $this->addSql('ALTER TABLE page DROP FOREIGN KEY FK_140AB620C54C8C93');
        $this->addSql('ALTER TABLE element_url DROP FOREIGN KEY FK_A3BED6C61F1F2A24');
        $this->addSql('ALTER TABLE element_detail DROP FOREIGN KEY FK_A71176071F1F2A24');
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC0071F1F2A24');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784181F1F2A24');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A761F1F2A24');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C1F1F2A24');
        $this->addSql('ALTER TABLE element DROP FOREIGN KEY FK_41405E39C54C8C93');
        $this->addSql('ALTER TABLE zone_page DROP FOREIGN KEY FK_86F277859F2C3FAB');
        $this->addSql('ALTER TABLE zone_detail DROP FOREIGN KEY FK_111557E19F2C3FAB');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784189F2C3FAB');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A769F2C3FAB');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C9F2C3FAB');
        $this->addSql('ALTER TABLE form_zone DROP FOREIGN KEY FK_34CAC4109F2C3FAB');
        $this->addSql('ALTER TABLE zone DROP FOREIGN KEY FK_A0EBC007C54C8C93');
        $this->addSql('ALTER TABLE partner_detail DROP FOREIGN KEY FK_13CDD6E89393F8FE');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784189393F8FE');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A769393F8FE');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C9393F8FE');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841893CB796C');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A7693CB796C');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C93CB796C');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F3610C54C8C93');
        $this->addSql('ALTER TABLE photo_detail DROP FOREIGN KEY FK_7BB908BB7E9E4C8C');
        $this->addSql('ALTER TABLE document_detail DROP FOREIGN KEY FK_9064CEF5C33F7837');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841829C1004E');
        $this->addSql('ALTER TABLE video_detail DROP FOREIGN KEY FK_1651DF5E29C1004E');
        $this->addSql('ALTER TABLE field_detail DROP FOREIGN KEY FK_442F391443707B0');
        $this->addSql('ALTER TABLE field DROP FOREIGN KEY FK_5BF54558727ACA70');
        $this->addSql('ALTER TABLE field DROP FOREIGN KEY FK_5BF545585FF69B7D');
        $this->addSql('ALTER TABLE form_zone DROP FOREIGN KEY FK_34CAC4105FF69B7D');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE page_url');
        $this->addSql('DROP TABLE page_detail');
        $this->addSql('DROP TABLE page_type');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE element_url');
        $this->addSql('DROP TABLE element_detail');
        $this->addSql('DROP TABLE element_type');
        $this->addSql('DROP TABLE zone');
        $this->addSql('DROP TABLE zone_page');
        $this->addSql('DROP TABLE zone_detail');
        $this->addSql('DROP TABLE zone_type');
        $this->addSql('DROP TABLE partner');
        $this->addSql('DROP TABLE partner_detail');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE file_type');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE photo_detail');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE document_detail');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE video_detail');
        $this->addSql('DROP TABLE infos');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE field_detail');
        $this->addSql('DROP TABLE field');
        $this->addSql('DROP TABLE form');
        $this->addSql('DROP TABLE form_zone');
    }
}
