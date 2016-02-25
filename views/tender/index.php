<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TenderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tenders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tender-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tender'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'itemOptions' =>
            [
//                'tag' => 'div',
//                'class' => 'form-control',
            ],
        //        'filterModel' => $searchModel,
        //        'columns' =>
        //            [
        //                ['class' => 'yii\grid\SerialColumn'],
        //
        //                'tender_id',
        //                'name',
        //                'info:ntext',
        //                'file:ntext',
        //                'date_start',
        //                'date_end',
        //                'price',
        //                // 'created_at',
        //                // 'updated_at',
        //                // 'user_id',
        //
        //                ['class' => 'yii\grid\ActionColumn'],
        //            ],
    ]); ?>

</div>
