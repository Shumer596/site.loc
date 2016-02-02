<?php

use yii\db\Schema;
use yii\db\Migration;

class m160202_122852_add_forignKey_to_user_trans_goods extends Migration
{
    public function up()
    {
        $this->addForeignKey('City_city_id', 'user', 'city_id', 'city', 'city_id');
        $this->addForeignKey('City_transport_charge_city_id', 'transport', 'charge_city_id', 'city', 'city_id');
        $this->addForeignKey('City_transport_discharge_city_id', 'transport', 'discharge_city_id', 'city', 'city_id');
        $this->addForeignKey('City_goods_charge_city_id', 'goods', 'charge_city_id', 'city', 'city_id');
        $this->addForeignKey('City_goods_discharge_city_id', 'goods', 'discharge_city_id', 'city', 'city_id');
    }

    public function down()
    {
        $this->dropForeignKey('City_city_id', 'user');
        $this->dropForeignKey('City_transport_charge_city_id', 'transport');
        $this->dropForeignKey('City_transport_discharge_city_id', 'transport');
        $this->dropForeignKey('City_goods_charge_city_id', 'goods');
        $this->dropForeignKey('City_goods_discharge_city_id', 'goods');
    }

}
