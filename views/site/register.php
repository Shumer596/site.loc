<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\City;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrationForm */
/* @var $form ActiveForm */
?>
<div class="site-register">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([
        User::SCENARIO_PERSON => Yii::t('app', 'Individual'),
        User::SCENARIO_COMPANY => Yii::t('app', 'Legal entity'),
    ], ['prompt' => Yii::t('app', 'Select the type of registration')]) ?>

    <?php $form = ActiveForm::begin(['id' => 'Individual_form']); ?>
    <div> <?= $form->field($model, 'activity')->dropDownList([
            User::CARRIER => Yii::t('app', 'Carrier'),
            User::FORWARDER => Yii::t('app', 'Forwarder'),
            User::SNIPER => Yii::t('app', 'Shipper'),
            User::DISPATCHER => Yii::t('app', 'Dispatcher'),
            User::FORWARDER_CARRIER => Yii::t('app', 'Forwarder-carrier'),
            User::SNIPER_CARRIER => Yii::t('app', 'Shipper-carrier'),
            User::INSURANCE_AGENT => Yii::t('app', 'Insurance agent'),
        ], ['prompt' => Yii::t('app', 'Select activity')]) ?></div>
    <div><?= $form->field($model, 'city')->widget(
            AutoComplete::className(), [
            'clientOptions' => [
                'source' => City::find()
                    ->select(['city_id as value', 'CONCAT(city.name,\', \', region.name ) as label'])
                    ->innerJoin('region', 'city.region_id = region.region_id')
                    ->orderBy("city_id asc")
                    ->asArray()
                    ->all()
            ],
            'options' => [
                'class' => 'form-control',
                'placeholder' => Yii::t('app', 'Start typing the name')
            ]
        ]); ?>
    </div>

    <div><?= $form->field($model, 'surName') ?></div>
    <div><?= $form->field($model, 'firstName') ?></div>
    <div><?= $form->field($model, 'lastName') ?></div>
    <div><?= $form->field($model, 'number') ?></div>
    <div><?= $form->field($model, 'skype') ?></div>
    <div><?= $form->field($model, 'email') ?></div>
    <div><?= $form->field($model, 'password') ?></div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <?php $form = ActiveForm::begin(['id' => 'Legal_form']); ?>
    <div class="show2"><?= $form->field($model, 'type_ownership')->dropDownList([
            User::PLC => Yii::t('app', 'PLC'),
            User::LTD => Yii::t('app', 'Ltd'),
            User::INC => Yii::t('app', 'Inc.'),
            User::CORP => Yii::t('app', 'Corp.'),
            User::LLC => Yii::t('app', 'LLC'),
            User::LDC => Yii::t('app', 'LDC'),
            User::IBC => Yii::t('app', 'IBC'),
            User::IC => Yii::t('app', 'IC'),
            User::LP => Yii::t('app', 'LP'),
        ], ['prompt' => Yii::t('app', 'Select the legal form')]) ?></div>
    <div class="show2"><?= $form->field($model, 'company') ?></div>
    <div> <?= $form->field($model, 'activity')->dropDownList([
            User::CARRIER => Yii::t('app', 'Carrier(company)'),
            User::FORWARDER => Yii::t('app', 'Forwarder(company)'),
            User::SNIPER => Yii::t('app', 'Shipper(company)'),
            User::DISPATCHER => Yii::t('app', 'Dispatcher(company)'),
            User::FORWARDER_CARRIER => Yii::t('app', 'Forwarder-carrier(company)'),
            User::SNIPER_CARRIER => Yii::t('app', 'Shipper-carrier(company)'),
            User::INSURANCE_AGENT => Yii::t('app', 'Insurance company'),
        ], ['prompt' => Yii::t('app', 'Select activity')]) ?></div>
    <div class="show2"><?= $form->field($model, 'INN') ?></div>
    <div><?= $form->field($model, 'city')->widget(
            AutoComplete::className(), [
            'clientOptions' => [
                'source' => City::find()
                    ->select(['city_id as value', 'CONCAT(city.name,\', \', region.name ) as label'])
                    ->innerJoin('region', 'city.region_id = region.region_id')
                    ->orderBy("city_id asc")
                    ->asArray()
                    ->all()
            ],
            'options' => [
                'class' => 'form-control',
                'placeholder' => Yii::t('app', 'Start typing the name')
            ]
        ]); ?>
    </div>
    <div class="show2"><?= $form->field($model, 'address') ?></div>
    <div><?= $form->field($model, 'surName') ?></div>
    <div><?= $form->field($model, 'firstName') ?></div>
    <div><?= $form->field($model, 'lastName') ?></div>
    <div><?= $form->field($model, 'number') ?></div>
    <div><?= $form->field($model, 'skype') ?></div>
    <div class="show2 hide2"><?= $form->field($model, 'site')->textInput(['value' => 'http://']) ?></div>
    <div><?= $form->field($model, 'email') ?></div>
    <div><?= $form->field($model, 'password') ?></div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php ActiveForm::end(); ?>
</div><!-- site-register -->
