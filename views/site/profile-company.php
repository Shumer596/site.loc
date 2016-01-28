<?php
use app\models\User;
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

    <p>
        <?= Html::a(Yii::t('app', 'Update profile'), ['update'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' =>
            [
                'type_ownership',
                'company',
                'activity',
                'INN',
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