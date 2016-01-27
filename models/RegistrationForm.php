<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use yii\helpers\VarDumper;

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
    public $type_ownership;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['status', 'activity', 'city', 'surName', 'firstName', 'number', 'email', 'password'], 'required', 'on' => User::SCENARIO_PERSON],
            [['status', 'activity', 'company', 'type_ownership', 'INN', 'city', 'address', 'firstName', 'lastName', 'number', 'email', 'password'], 'required', 'on' => User::SCENARIO_COMPANY],
            [['INN'], 'integer'],
            [['address'], 'string'],
            [['email'], 'email'],
            [['status', 'city', 'activity', 'company', 'type_ownership', 'firstName', 'surName', 'lastName', 'site'], 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => 'app\models\User'],
            [['company'], 'unique', 'targetClass' => 'app\models\User'],
            [['INN'], 'unique', 'targetClass' => 'app\models\User'],
            [['email', 'password', 'skype'], 'string', 'max' => 100],
            [['number'], 'string', 'max' => 20]
        ];
    }

    /**
     * @return bool
     */
    public function register()
    {
        if ($this->validate()) {
            $user = new User;
            if (User::SCENARIO_PERSON == $this->status) {
                $user->setScenario($this->status);
            } elseif (User::SCENARIO_COMPANY == $this->status) {
                $user->setScenario($this->status);
            } else {
                return false;
            }
            $user->setAttributes($this->getAttributes());
            $user->setPassword($this->password);
            return $user->save();
        }
        return false;
    }


    public
    function attributeLabels()
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
