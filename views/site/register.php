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
    <div class="show1 show2"> <?= $form->field($model, 'activity')->dropDownList([
            User::CARRIER => Yii::t('app', 'Carrier'),
            User::FORWARDER => Yii::t('app', 'Forwarder'),
            User::SNIPER => Yii::t('app', 'Shipper'),
            User::DISPATCHER => Yii::t('app', 'Dispatcher'),
            User::FORWARDER_CARRIER => Yii::t('app', 'Forwarder-carrier'),
            User::SNIPER_CARRIER => Yii::t('app', 'Shipper-carrier'),
            User::INSURANCE_AGENT => Yii::t('app', 'Insurance agent'),
        ], ['prompt' => Yii::t('app', 'Select activity')]) ?></div>
    <div class="show1 show2"><?= $form->field($model, 'city')->widget(
            AutoComplete::className(), [
            'clientOptions' => [
                'source' => City::find()
                    ->select(['CONCAT(\'some text\',name) as label'])
//                    ->select(['city_id as value', 'name as label'])
                    ->asArray()
                    ->all(),
            ],
            'options' => [
                'class' => 'form-control',
                'placeholder' => Yii::t('app', 'Start typing the name')
            ]
        ]); ?>
    </div>

    <div class="show1 show2"><?= $form->field($model, 'surName') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'firstName') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'lastName') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'number') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'email') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'skype') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'password') ?></div>
    <div class="show2 hide2"><?= $form->field($model, 'INN') ?></div>
    <div class="show2 hide2"><?= $form->field($model, 'address') ?></div>
    <div class="show2 hide2"><?= $form->field($model, 'company') ?></div>
    <div class="show2 hide2"><?= $form->field($model, 'type_ownership')->dropDownList([
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
    <div class="show2 hide2"><?= $form->field($model, 'site')->textInput(['value' => 'http://']) ?></div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->
