<?php
use app\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profile'), 'url' => ['user/profile']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="user-form">

        <?php $form = ActiveForm::begin(['id' => 'Legal_form']); ?>
        <?= $form->field($model, 'status')->hiddenInput(['value' => User::SCENARIO_COMPANY])->label(false) ?>
        <div><?= $form->field($model, 'type_ownership')->dropDownList(User::getOwnership(), ['prompt' => Yii::t('app', 'Select the legal form')]) ?></div>
        <div><?= $form->field($model, 'company') ?></div>
        <div><?= $form->field($model, 'activity')->dropDownList(User::getCompanyActivity(), ['prompt' => Yii::t('app', 'Select activity')]) ?></div>
        <div><?= $form->field($model, 'INN') ?></div>
        <div><?= $form->field($model, 'city_id')->widget(
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
                            'id' => 'LegalCity',
                            'class' => 'form-control',
                            'placeholder' => Yii::t('app', 'Start typing the name')
                        ]
                ]) ?>
        </div>
        <div><?= $form->field($model, 'city_id')->hiddenInput(['id' => 'city_input2'])->label(false) ?></div>
        <div><?= $form->field($model, 'address') ?></div>
        <div><?= $form->field($model, 'surName') ?></div>
        <div><?= $form->field($model, 'firstName') ?></div>
        <div><?= $form->field($model, 'lastName') ?></div>
        <div><?= $form->field($model, 'number') ?></div>
        <div><?= $form->field($model, 'skype') ?></div>
        <div><?= $form->field($model, 'site')->textInput(['value' => 'http://']) ?></div>
        <div><?= $form->field($model, 'email') ?></div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>