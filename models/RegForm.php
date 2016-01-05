<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegForm is the model behind the login form.
 */
class RegForm extends Model
{
    public $status;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['status'], 'required'],

        ];
    }

    public function register()
    {
        if ($this->validate()) {
            $user = new User;
            $user->status = $this->status;
            return $user->save();
        }
        return false;
    }

    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', ''),
            'city' => Yii::t('app', 'City'),
            'activity' => Yii::t('app', 'Activity'),
            'company' => Yii::t('app', 'Company'),
            'INN' => Yii::t('app', 'Inn'),
            'address' => Yii::t('app', 'Address'),
            'firstName' => Yii::t('app', 'First Name'),
            'surName' => Yii::t('app', 'Sur Name'),
            'lastName' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'number' => Yii::t('app', 'Number'),
            'site' => Yii::t('app', 'Site'),
            'skype' => Yii::t('app', 'Skype'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'token' => Yii::t('app', 'Token'),
        ];
    }

}
