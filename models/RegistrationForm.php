<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegForm is the model behind the login form.
 */
class RegistrationForm extends Model
{
    public $status;
    public $city;
    public $activity;
    public $company;
    public $INN;
    public $address;
    public $firstName;
    public $surName;
    public $lastName;
    public $email;
    public $password;
    public $number;
    public $site;
    public $skype;
    public $authKey;
    public $token;
    public $type_ownership;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['status', 'city', 'activity', 'company', 'type_ownership', 'INN', 'address', 'firstName', 'surName', 'email', 'password', 'number'], 'required'],
            [['INN'], 'integer'],
            [['address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status', 'city', 'activity', 'company', 'type_ownership', 'firstName', 'surName', 'lastName', 'site', 'authKey', 'token'], 'string', 'max' => 255],
            [['email', 'password', 'skype'], 'string', 'max' => 100],
            [['number'], 'string', 'max' => 20]
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
            'status' => Yii::t('app', 'Status'),
            'city' => Yii::t('app', 'City'),
            'activity' => Yii::t('app', 'Activity'),
            'company' => Yii::t('app', 'Company'),
            'type_ownership' => Yii::t('app', 'Type Ownership'),
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
        ];
    }

}
