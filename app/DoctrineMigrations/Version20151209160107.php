<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20151209160107 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('users');

        $table->addColumn('id', 'integer');
        $table->setPrimaryKey(['id']);

        $table->addColumn('username', 'string');
        $table->addUniqueIndex(['username']);

        $table->addColumn('password', 'string');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('users');
    }
}
