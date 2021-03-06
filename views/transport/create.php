<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Transport */

$this->title = Yii::t('app', 'Add Transport');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transport-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
