<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_120647_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'user_id' => 'pk',
            'status' => 'string NOT NULL', //физ или юр лицо
            'city' => 'string NOT NULL',      //город
            'activity' => 'string NOT NULL',  //деятельность
            'company' => 'string NOT NULL',   //название компании
            'type_ownership' => 'string NOT NULL',   //форма собственности
            'INN' => 'int(16) NULL',   //ИНН
            'address' => 'text NOT NULL',
            'firstName' => 'string NOT NULL',
            'surName' => 'string NOT NULL',
            'lastName' => 'string NULL',
            'email' => 'varchar(100) NOT NULL',
            'password' => 'varchar(100) NOT NULL',
            'number' => 'string(20) NOT NULL',
            'site' => 'string NULL',
            'skype' => 'varchar(100) NULL',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
            'authKey' =>Schema::TYPE_STRING,
            'token' =>Schema::TYPE_STRING,
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
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
