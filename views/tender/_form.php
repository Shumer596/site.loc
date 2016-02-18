<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tender */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tender-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file')->fileInput(
    ) ?>

    <?= $form->field($model, 'date_start')->widget(
        DatePicker::className(),
        [
            'dateFormat' => 'yyyy-MM-dd',
            'options' =>
                [
                    'class' => 'form-control',
                ]
        ]
    ) ?>

    <?= $form->field($model, 'date_end')->widget(
        DatePicker::className(),
        [
            'dateFormat' => 'yyyy-MM-dd',
            'options' =>
                [
                    'class' => 'form-control',
                ]
        ]
    ) ?>

    <?= $form->field($model, 'price')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
