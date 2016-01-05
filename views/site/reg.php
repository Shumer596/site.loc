<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */
?>
<div class="site-reg">
    <h2>Форма регистрации</h2>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'status')->dropDownList([
            '0'=>'Физическое лицо',
            '1'=>'Юридическое лицо',
        ],['prompt'=>'Выбирите тип регистриции']) ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-reg -->
