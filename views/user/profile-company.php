<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
$this->title = Yii::t('app', 'Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' =>
            [
                'status',
                'type_ownership',
                'company',
                'INN',
                'activity',
                'city',
                'address',
                'surName',
                'firstName',
                'lastName',
                'number',
                'skype',
                'site',
                'email',
                'created_at'
            ],
    ]) ?>

</div>