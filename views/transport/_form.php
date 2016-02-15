<?php

use app\models\Transport;
use yii\bootstrap\BootstrapAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Transport */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile(Yii::getAlias('@web') . '/css/transport.css', ['depends' => [BootstrapAsset::className()]]);
$this->registerJsFile(Yii::getAlias('@web') . '/js/transport.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="transport-form">

    <?php $form = ActiveForm::begin(); ?>
    <h4><?= Yii::t('app', 'Route') ?></h4>
    <?= $form->field($model, 'charge_city_id')->widget(
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
    <?= $form->field($model, 'charge_city_id')->hiddenInput(['id' => 'city_input1'])->label(false) ?>

    <?= $form->field($model, 'discharge_city_id')->widget(
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

    <?= $form->field($model, 'discharge_city_id')->hiddenInput(['id' => 'city_input2'])->label(false) ?>
    <br/>
    <h4><?= Yii::t('app', 'Transport') ?></h4>
    <?= $form->field($model, 'carcase')->dropDownList(Transport::getCarCase(), ['prompt' => Yii::t('app', 'Select the carcase')]) ?>

    <?= $form->field($model, 'carcase_charge')->dropDownList(Transport::getCarCaseCharge(), [
        'prompt' => Yii::t('app', 'Select the carcase'),
        'value' => 'any']) ?>

    <?= $form->field($model, 'capacity')->textInput() ?>

    <?= $form->field($model, 'size')->textInput() ?>
    <br/>
    <h4><?= Yii::t('app', 'Time') ?></h4>
    <?= $form->field($model, 'status_charge')->dropDownList(Transport::getStatus(), [
        'prompt' => Yii::t('app', 'Select the carcase')]) ?>

    <?= $form->field($model, 'charge_start')->widget(
        DatePicker::className(),
        [
            'dateFormat' => 'yyyy-MM-dd',
            'options' =>
                [
                    'class' => 'form-control',
                ]
        ]
    ) ?>

    <?= $form->field($model, 'charge_end')->widget(
        DatePicker::className(),
        [
            'dateFormat' => 'yyyy-MM-dd',
            'options' =>
                [
                    'class' => 'form-control',
                ]
        ]
    ) ?>
    <br/>
    <h4><?= Yii::t('app', 'Work') ?></h4>
    <?= $form->field($model, 'work_preferences')->dropDownList($model->getPrefer(), [
        'prompt' => Yii::t('app', 'Select prefer')]) ?>
    <br/>
    <h4><?= Yii::t('app', 'Payment') ?></h4>
    <?= $form->field($model, 'city_rate')->textInput() ?>

    <?= $form->field($model, 'intercity_rate')->textInput() ?>

    <?= $form->field($model, 'passage_rate')->textInput() ?>
    <br/>
    <h5><?= Yii::t('app', 'Ext. information') ?></h5>
    <?= $form->field($model, 'info')->textarea(['rows' => 4]) ?>
    <br/>
    <h5><?= Yii::t('app', 'Placement period') ?></h5>
    <?= $form->field($model, 'term')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Add') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
