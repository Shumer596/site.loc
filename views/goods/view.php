<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->goods_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->goods_id], [
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
            'passage_rate',
            'info:ntext',
            'term',
            'created_at',
            'updated_at',
            'user_id',
        ],
    ]) ?>

</div>
