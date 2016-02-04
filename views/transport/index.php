<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transports');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transport-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Transport'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'transport_id',
            'charge_city_id',
            'discharge_city_id',
            'carcase',
            'carcase_charge',
            // 'capacity',
            // 'size',
            // 'status_charge',
            // 'charge_start',
            // 'charge_end',
            // 'work_preferences',
            // 'city_rate',
            // 'intercity_rate',
            // 'passage_rate',
            // 'info:ntext',
            // 'term',
            // 'created_at',
            // 'updated_at',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
