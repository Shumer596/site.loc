<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Transports');
$this->params['breadcrumbs'][] = $this->title;
//VarDumper::dump($dataProvider->getModels());
?>
<div class="transport-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Add Transport'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'transport_id',
            [
              'label'=> 'Charge City',
              'value'=> 'chargeCity.name',
            ],
            [
                'label'=> 'Discharge City',
                'value'=> 'dischargeCity.name',
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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
