<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'goods_id') ?>

    <?= $form->field($model, 'charge_city_id') ?>

    <?= $form->field($model, 'discharge_city_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'tare') ?>

    <?php // echo $form->field($model, 'goods_weight') ?>

    <?php // echo $form->field($model, 'goods_size') ?>

    <?php // echo $form->field($model, 'carcase') ?>

    <?php // echo $form->field($model, 'carcase_charge') ?>

    <?php // echo $form->field($model, 'capacity') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'work_preferences') ?>

    <?php // echo $form->field($model, 'status_charge') ?>

    <?php // echo $form->field($model, 'charge_start') ?>

    <?php // echo $form->field($model, 'charge_end') ?>

    <?php // echo $form->field($model, 'city_rate') ?>

    <?php // echo $form->field($model, 'intercity_rate') ?>

    <?php // echo $form->field($model, 'passage_rate') ?>

    <?php // echo $form->field($model, 'info') ?>

    <?php // echo $form->field($model, 'term') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
