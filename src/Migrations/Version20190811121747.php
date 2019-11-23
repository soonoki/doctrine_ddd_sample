<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190811121747 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'purchase_order_linesテーブル作成';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $sql =<<<SQL
CREATE TABLE purchase_order_lines (
    id INT AUTO_INCREMENT,
    purchase_order_id VARCHAR(64) NOT NULL,
    line_number INT NOT NULL,
    product_id VARCHAR(64) NOT NULL,
    quantity INT NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE INDEX(purchase_order_id, line_number),
    FOREIGN KEY purchase_order_id_fk(purchase_order_id) REFERENCES purchase_orders(id)
)
SQL;

        $this->addSql($sql);
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable('purchase_order_lines');
    }
}
