<?php

use app\models\Transport;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransportForm */
/* @var $form ActiveForm */
?>
<div class="user-transport">

    <?php $form = ActiveForm::begin(); ?>

    <div><?= $form->field($model, 'charge_city_id')->widget(
            AutoComplete::className(),
            [
                'clientOptions' =>
                    [
                        'source' => Url::to(['site/autocomplete']),
                        'autoFill' => true,
                        'minLength' => '3',
                        'select' => new JsExpression("function(event, ui) {
                                         this.value = ui.item.label;
                                         $('#city_input1').val(ui.item.value);
                                         return false;
                                }")
                    ],
                'options' =>
                    [
                        'id' => 'charge_city',
                        'class' => 'form-control',
                        'placeholder' => Yii::t('app', 'Start typing the name')
                    ]
            ]) ?>
    </div>
    <div><?= $form->field($model, 'charge_city_id')->hiddenInput(['id' => 'city_input1'])->label(false) ?></div>

    <div><?= $form->field($model, 'discharge_city_id')->widget(
            AutoComplete::className(),
            [
                'clientOptions' =>
                    [
                        'source' => Url::to(['site/autocomplete']),
                        'autoFill' => true,
                        'minLength' => '3',
                        'select' => new JsExpression("function(event, ui) {
                                         this.value = ui.item.label;
                                         $('#city_input2').val(ui.item.value);
                                         return false;
                                }")
                    ],
                'options' =>
                    [
                        'id' => 'discharge_city',
                        'class' => 'form-control',
                        'placeholder' => Yii::t('app', 'Start typing the name')
                    ]
            ]) ?>
    </div>
    <div><?= $form->field($model, 'discharge_city_id')->hiddenInput(['id' => 'city_input2'])->label(false) ?></div>

    <?= $form->field($model, 'carcase')->dropDownList(Transport::getCarCase(), ['prompt' => Yii::t('app', 'Select the carcase')]) ?>
    <?= $form->field($model, 'carcase_charge')->dropDownList(Transport::getCarCaseCharge(), [
        'prompt' => Yii::t('app', 'Select the carcase'),
    'value'=>'ANY'])?>
    <?= $form->field($model, 'capacity') ?>
    <?= $form->field($model, 'size') ?>
    <?= $form->field($model, 'status_charge') ?>
    <?= $form->field($model, 'term') ?>
    <?= $form->field($model, 'city_rate') ?>
    <?= $form->field($model, 'intercity_rate') ?>
    <?= $form->field($model, 'passage_rate') ?>
    <?= $form->field($model, 'charge_start') ?>
    <?= $form->field($model, 'charge_end') ?>
    <?= $form->field($model, 'info') ?>
    <?= $form->field($model, 'work_preferences') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-transport -->
