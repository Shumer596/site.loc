<?php

namespace app\controllers;

use app\models\ProfileForm;
use app\models\TransportForm;
use app\models\User;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;

class UserController extends Controller
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

    public function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }

    public function actionUpdate()
    {
        $user = $this->findModel();
        $model = new ProfileForm($user);
        if ($model->load(Yii::$app->request->post()) && $model->update()) {
            return $this->redirect(['profile']);
        } else {
            echo 'FUCK! Update() does not work!';
            if ($model->status == User::SCENARIO_PERSON) {
                return $this->render('update-person', [
                    'model' => $model,
                ]);
            } elseif ($model->status == User::SCENARIO_COMPANY) {
                return $this->render('update-company', [
                    'model' => $model,
                ]);
            } else {
                false;
            }
        }
    }

    public function actionTransport()
    {
        $model = new TransportForm();

        if ($model->load(Yii::$app->request->post()) && $model->addTransport()) {

        }

        return $this->render('transport', [
            'model' => $model,
        ]);
    }

}
