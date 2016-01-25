<?php

use app\models\User;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\jui\AutoComplete;
use app\models\City;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrationForm */
/* @var $form ActiveForm */
$this->registerCssFile('/site.loc/web/css/form.css');
$this->registerJsFile('/site.loc/web/js/form.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="site-register">

    <?php echo Html::activeDropDownList($model, 'status',
        [
            User::SCENARIO_PERSON => Yii::t('app', 'Individual'),
            User::SCENARIO_COMPANY => Yii::t('app', 'Legal entity'),
        ],
        [
            'prompt' => 'Select type of registration',
            'class' => 'form-control',
        ]
    ) ?>


    <?php $form = ActiveForm::begin(['id' => 'Individual_form']); ?>
    <?= $form->field($model, 'status')->hiddenInput(['value' => User::SCENARIO_PERSON])->label(false) ?>
    <div> <?= $form->field($model, 'activity')->dropDownList(User::getActivity(),
            ['prompt' => Yii::t('app', 'Select activity')]) ?></div>
    <div><?= $form->field($model, 'city')->widget(
            AutoComplete::className(), [
            'clientOptions' => [
                'source' => City::find()
                    ->select(['city_id as value', 'CONCAT(city.name,\', \', region.name ) as label', 'region.name as region'])
                    ->innerJoin('region', 'city.region_id = region.region_id')
                    ->andFilterWhere(['like', 'name', Yii::$app->request->get('term')])
                    ->asArray()
                    ->all(),
                'select' => new JsExpression('function(event, ui) {
                             this.value = ui.item.id + "бл. " + ui.item.name;
                             window.location = ui.item.id;
                             }')
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
    <div><?= $form->field($model, 'password')->passwordInput() ?></div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    <?php $form = ActiveForm::begin(['id' => 'Legal_form']); ?>
    <?= $form->field($model, 'status')->hiddenInput(['value' => User::SCENARIO_COMPANY])->label(false) ?>
    <div><?= $form->field($model, 'type_ownership')->dropDownList(User::getOwnership(), ['prompt' => Yii::t('app', 'Select the legal form')]) ?></div>
    <div><?= $form->field($model, 'company') ?></div>
    <div><?= $form->field($model, 'activity')->dropDownList(User::getCompanyActivity(), ['prompt' => Yii::t('app', 'Select activity')]) ?></div>
    <div><?= $form->field($model, 'INN') ?></div>
    <div><?= $form->field($model, 'city')->widget(
            AutoComplete::className(), [
            'clientOptions' => [
//                'source' => City::find()
//                    ->select(['city_id as value', 'CONCAT(city.name,\', \', region.name ) as label', 'region.name as region'])
//                    ->innerJoin('region', 'city.region_id = region.region_id')
//                    ->andFilterWhere(['like', 'name', Yii::$app->request->get('term')])
//                    ->asArray()
//                    ->all(),
                'source' => Url::to(['site/autocomplete']),
                'autoFill'=>true,
                'minLength'=>'0',
                'select' => new JsExpression('function(event, ui) {
                             this.value = ui.item.id + "бл. " + ui.item.name;
                             window.location = ui.item.id;
                             }')

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
    <div><?= $form->field($model, 'password')->passwordInput() ?></div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div><!-- site-register -->