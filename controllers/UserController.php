<?php

namespace app\controllers;

use app\models\User;
use Yii;

class UserController extends \yii\web\Controller
{
    public function actionProfile()
    {
        $model = $this->findModel();
        if ($model->status == User::SCENARIO_PERSON) {
            return $this->render('profile-person', [
                'model' => $model,
            ]);
        } elseif ($model->status == User::SCENARIO_COMPANY) {
            return $this->render('profile-company', [
                'model' => $model,
            ]);
        } else {
            false;
        }
    }

    public function findModel(){

        return User::findOne(Yii::$app->user->identity->getId());
    }

}
