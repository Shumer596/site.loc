<?php
use app\models\City;
use yii\helpers\Html;
use yii\helpers\Json;
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
        <?= Html::a(Yii::t('app', 'Update'), ['user/update'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Change Password'), ['password-change'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' =>
            [
                'status',
                'email',
                'activity',
                [
                    'label' => 'City',
                    'value' => City::findById($model->city_id)
                ],
                'surName',
                'firstName',
                'lastName',
                'number',
                'skype',
                'created_at'
            ],
    ]) ?>

</div>