<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Goods');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Goods'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'goods_id',
            'charge_city_id',
            'discharge_city_id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
