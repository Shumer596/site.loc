<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Transport */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Transport',
]) . ' ' . $model->transport_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->transport_id, 'url' => ['view', 'id' => $model->transport_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="transport-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
