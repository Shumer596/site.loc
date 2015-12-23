<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_195141_create_transport_table extends Migration
{
    public function up()
    {
        $this->createTable('transport',[

        ]);
    }

    public function down()
    {
        $this->dropTable('transport');
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
