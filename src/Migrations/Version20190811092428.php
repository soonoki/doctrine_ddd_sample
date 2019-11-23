<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190811092428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'purchase_ordersテーブル作成';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $sql =<<<SQL
CREATE TABLE purchase_orders (
    id VARCHAR(64),
    order_number VARCHAR(255) NOT NULL,
    shipping_address_zip_code VARCHAR(16) NOT NULL,
    shipping_address_prefecture VARCHAR(255) NOT NULL,
    shipping_address_city VARCHAR(255) NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
SQL;

        $this->addSql($sql);
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable('purchase_orders');

    }
}
