<?php

use app\models\City;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transport */

$this->title = $model->transport_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transport-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->transport_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->transport_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'transport_id',
            [
                'label' => 'Charge city',
                'value' => City::findById($model->charge_city_id)
            ],
            [
                'label' => 'Discharge city',
                'value' => City::findById($model->discharge_city_id)
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
            'passage_rate',
            'info:text',
            'term',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
