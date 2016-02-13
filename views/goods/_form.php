<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'charge_city_id')->textInput() ?>

    <?= $form->field($model, 'discharge_city_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tare')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'goods_weight')->textInput() ?>

    <?= $form->field($model, 'goods_size')->textInput() ?>

    <?= $form->field($model, 'carcase')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carcase_charge')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacity')->textInput() ?>

    <?= $form->field($model, 'size')->textInput() ?>

    <?= $form->field($model, 'work_preferences')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_charge')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'charge_start')->textInput() ?>

    <?= $form->field($model, 'charge_end')->textInput() ?>

    <?= $form->field($model, 'city_rate')->textInput() ?>

    <?= $form->field($model, 'intercity_rate')->textInput() ?>

    <?= $form->field($model, 'passage_rate')->textInput() ?>

    <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'term')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
