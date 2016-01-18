<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveField;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\City;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrationForm */
/* @var $form ActiveForm */
$this->registerCssFile('/css/form.css');
$this->registerJsFile('/js/form.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="site-register">

    <?php echo Html::activeDropDownList($model, 'status', [
        User::SCENARIO_PERSON => Yii::t('app', 'Individual'),
        User::SCENARIO_COMPANY => Yii::t('app', 'Legal entity'),
    ],['prompt'=>'Select type of registration']) ?>


    <?php $form = ActiveForm::begin(['id' => 'Individual_form']); ?>
    <div> <?= $form->field($model, 'activity')->dropDownList(User::getActivity(),
            ['prompt' => Yii::t('app', 'Select activity')]) ?></div>
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
    <div><?= $form->field($model, 'type_ownership')->dropDownList(User::getOwnership(), ['prompt' => Yii::t('app', 'Select the legal form')]) ?></div>
    <div><?= $form->field($model, 'company') ?></div>
    <div><?= $form->field($model, 'activity')->dropDownList(User::getCompanyActivity(), ['prompt' => Yii::t('app', 'Select activity')]) ?></div>
    <div><?= $form->field($model, 'INN') ?></div>
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
    <div><?= $form->field($model, 'address') ?></div>
    <div><?= $form->field($model, 'surName') ?></div>
    <div><?= $form->field($model, 'firstName') ?></div>
    <div><?= $form->field($model, 'lastName') ?></div>
    <div><?= $form->field($model, 'number') ?></div>
    <div><?= $form->field($model, 'skype') ?></div>
    <div><?= $form->field($model, 'site')->textInput(['value' => 'http://']) ?></div>
    <div><?= $form->field($model, 'email') ?></div>
    <div><?= $form->field($model, 'password') ?></div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div><!-- site-register -->