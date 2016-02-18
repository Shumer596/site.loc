<?php

/* @var $this yii\web\View */
/* @var $dataProviderTransport yii\data\ActiveDataProvider */
/* @var $searchTransport app\models\TransportSearch */
/* @var $dataProviderGoods yii\data\ActiveDataProvider */
/* @var $searchGoods app\models\TransportSearch */
/* @var $dataProviderTender yii\data\ActiveDataProvider */

use yii\grid\GridView;
use yii\widgets\ListView;

$this->title = 'INGRUZ.RU';
?>

<div class="transport-index">
    <h3>Transport index</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderTransport,
        //        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //            'transport_id',
            [
                'label' => 'Charge City',
                'value' => 'chargeCity.name',
            ],
            [
                'label' => 'Discharge City',
                'value' => 'dischargeCity.name',
            ],
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
    <?= GridView::widget([
        'dataProvider' => $dataProviderGoods,
        //        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //            'goods_id',
            [
                'label' => 'Charge City',
                'value' => 'chargeCity.name',
            ],
            [
                'label' => 'Discharge City',
                'value' => 'dischargeCity.name',
            ],
            'name',
            'tare',
            'goods_weight',
            'goods_size',
            'carcase',
            'carcase_charge',
            'capacity',
            'size',
            'work_preferences',
            'status_charge',
            'charge_start',
            'charge_end',
            'city_rate',
            'intercity_rate',
            //             'passage_rate',
            //             'info:ntext',
            'term',
            // 'created_at',
            // 'updated_at',
            // 'user_id',

            //            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<div class="transport-index">
    <h3>Tender index</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProviderTender,
        //        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tender_id',
            'name',
            'info:ntext',
            //            'file:ntext',
            'date_start',
            'date_end',
            'price',
            // 'created_at',
            // 'updated_at',
            // 'user_id',

            //            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>