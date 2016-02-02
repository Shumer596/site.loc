<?php

use yii\db\Schema;
use yii\db\Migration;

class m151224_120440_create_goods_table extends Migration
{
    /**
     *
     */
    public function up()
    {
        $this->createTable('goods', [
            'goods_id' => 'pk',
            'charge_city_id' => 'int(11) NOT NULL',
            'discharge_city_id' => 'int(11) NOT NULL',
            'name' => 'string NOT NULL',
            'tare' => 'string NOT NULL',
            'goods_weight' => 'DOUBLE(3,3) NOT NULL',
            'goods_size' => 'DOUBLE(3,3) NOT NULL',
            'carcase' => 'string NOT NULL',
            'carcase_charge' => 'string NOT NULL',
            'capacity' => 'DOUBLE(3,3) NOT NULL',
            'size' => 'DOUBLE(3,3) NOT NULL',
            'work_preferences' => 'string NULL',
            'status_charge' => 'string NOT NULL',
            'charge_start' => 'date',
            'charge_end' => 'date',
            'city_rate' => 'DOUBLE(19,4) NULL',
            'intercity_rate' => 'DOUBLE(19,4) NULL',
            'passage_rate' => 'DOUBLE(19,4) NULL',
            'info' => 'text NULL',
            'term' => 'int(2) NOT NULL',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
            'user_id' => 'int(11)',
        ]);

        $this->addForeignKey('Goods_user_id', 'goods', 'user_id', 'user', 'user_id');
    }

    public function down()
    {
        $this->dropTable('goods');
    }

}