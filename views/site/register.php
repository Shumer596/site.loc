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
        User::PERSON => Yii::t('app', 'Individual'),
        User::COMPANY => Yii::t('app', 'Legal entity'),
    ], ['prompt' => Yii::t('app', 'Select the type of registration')]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div><!-- site-reg -->
