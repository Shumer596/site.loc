<?php
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="user-profile">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div><?= $form->field($model, 'status') ?></div>
    <div> <?= $form->field($model, 'activity')->dropDownList(User::getActivity(),
            ['prompt' => Yii::t('app', 'Select activity')]) ?></div>
    <div><?= $form->field($model, 'city')->widget(
            AutoComplete::className(),
            [
                'clientOptions' =>
                    [
                        'source' => Url::to(['site/autocomplete']),
                        'autoFill' => true,
                        'minLength' => '3',
//                        'select' => new JsExpression('function(event, ui) {
//
//                             }')
                    ],
                'options' =>
                    [
                        'id' => 'IndividualCity',
                        'class' => 'form-control',
                        'placeholder' => Yii::t('app', 'Start typing the name')
                    ]
            ]) ?>
    </div>
    <div><?= $form->field($model, 'surName') ?></div>
    <div><?= $form->field($model, 'firstName') ?></div>
    <div><?= $form->field($model, 'lastName') ?></div>
    <div><?= $form->field($model, 'number') ?></div>
    <div><?= $form->field($model, 'skype') ?></div>
    <div><?= $form->field($model, 'email') ?></div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-profile -->