<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
    <div class="show1 show2"> <?= $form->field($model, 'activity') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'city') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'surName') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'firstName') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'lastName') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'number') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'email') ?></div>
    <div class="show1 show2"><?= $form->field($model, 'skype') ?></div>
    <div class="show1 show2 "><?= $form->field($model, 'password') ?></div>
    <div class="show2 hide2"><?= $form->field($model, 'INN') ?></div>
    <div class="show2 hide2"><?= $form->field($model, 'address') ?></div>
    <div class="show2 hide2"><?= $form->field($model, 'company') ?></div>
    <div class="show2 hide2"><?= $form->field($model, 'type_ownership') ?></div>
    <div class="show2 hide2"><?= $form->field($model, 'site') ?></div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->
