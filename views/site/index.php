<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\models\TransportSearch */

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>

<div class="transport-index">
    <h3>Transport index</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'transport_id',
            'charge_city_id',
            'discharge_city_id',
            'carcase',
            'carcase_charge',
            'capacity',
            'size',
            'status_charge',
            'charge_start',
            'charge_end',
            'work_preferences',
            'city_rate',
            'intercity_rate',
//            'passage_rate',
//            'info:text',
            'term',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<div class="transport-index">
    <h3>Goods index</h3>
</div>

<div class="transport-index">
    <h3>Tender index</h3>
</div>