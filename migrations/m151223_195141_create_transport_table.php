<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_195141_create_transport_table extends Migration
{
    public function up()
    {
        $this->createTable('transport', [
            'transportId' => 'pk',
            'charge_city' => 'string NOT NULL',
            'discharge_city' => 'string NOT NULL',
            'carcase' => 'string NOT NULL',
            'carcase_charge' => 'string NOT NULL',
            'capacity' => 'DOUBLE(19,4) NOT NULL',
            'size' => 'DOUBLE(19,4) NOT NULL',
            'status_charge' => 'string NOT NULL',
            'charge_start' => 'date',
            'charge_end' => 'date',
            'work_preferences' => 'string NULL',
            'city_rate' => 'DOUBLE(19,4) NULL',
            'intercity_rate' => 'DOUBLE(19,4) NULL',
            'passage_rate' => 'DOUBLE(19,4) NULL',
            'info' => 'text NULL',
            'term' => 'int(2) NOT NULL',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'userId' => 'int(11)',
        ]);

        $this->addForeignKey('Transport_user_id', 'transport', 'userId', 'user', 'userId');
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
