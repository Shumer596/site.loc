<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\RegistrationForm */
/* @var $form ActiveForm */
?>
<div class="site-reg">
    <h3><?php echo(Yii::t('app', 'Registry Form')) ?></h3>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([
        User::SCENARIO_PERSON => Yii::t('app', 'Individual'),
        User::SCENARIO_COMPANY => Yii::t('app', 'Legal entity'),
    ], ['prompt' => Yii::t('app', 'Select the type of registration')]) ?>
    <?= $form->field($model, 'city') ?>
    <?= $form->field($model, 'activity') ?>
    <?= $form->field($model, 'company') ?>
    <?= $form->field($model, 'type_ownership') ?>
    <?= $form->field($model, 'INN') ?>
    <?= $form->field($model, 'address') ?>
    <?= $form->field($model, 'firstName') ?>
    <?= $form->field($model, 'surName') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password') ?>
    <?= $form->field($model, 'number') ?>
    <?= $form->field($model, 'lastName') ?>
    <?= $form->field($model, 'site') ?>
    <?= $form->field($model, 'skype') ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div><!-- site-reg -->
