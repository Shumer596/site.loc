<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_192954_create_tender_table extends Migration
{
    public function up()
    {
        $this->createTable('tender', [
            'tender_id' => 'pk',
            'name' => 'string NOT NULL',
            'info' => 'text NOT NULL',
            'file' => 'text NOT NULL',
            'date_start' => 'date',
            'date_end' => 'date',
            'price' => 'DOUBLE(19,4)',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
            'user_id' => 'int(11)',
        ]);

        $this->addForeignKey('Tender_user_id', 'tender', 'user_id', 'user', 'user_id');
    }

    public function down()
    {
        $this->dropTable('tender');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
