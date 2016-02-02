<?php

namespace app\models;

use Yii;
use yii\base\ErrorException;
use yii\base\Model;
use yii\base\ViewRenderer;
use yii\console\Exception;
use yii\db\ActiveQuery;
use yii\helpers\VarDumper;

class ProfileForm extends Model
{

    public $status;
    public $city_id;
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
     * @var User
     */
    private $_user;

    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }

    public function init()
    {
        $this->email = $this->_user->email;
        $this->status = $this->_user->status;
        $this->activity = $this->_user->activity;
        $this->type_ownership = $this->_user->type_ownership;
        $this->address = $this->_user->address;
        $this->surName = $this->_user->surName;
        $this->firstName = $this->_user->firstName;
        $this->lastName = $this->_user->lastName;
        $this->skype = $this->_user->skype;
        $this->site = $this->_user->site;
        $this->company = $this->_user->company;
        $this->number = $this->_user->number;
        $this->INN = $this->_user->INN;
        $this->city_id = $this->_user->city_id;
        $this->password = $this->_user->password;
        parent::init();
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'activity', 'city_id', 'surName', 'firstName', 'number', 'email', 'password'], 'required', 'on' => User::SCENARIO_PERSON],
            [['status', 'activity', 'company', 'type_ownership', 'INN', 'city_id', 'address', 'firstName', 'lastName', 'number', 'email', 'password'], 'required', 'on' => User::SCENARIO_COMPANY],
            [['INN','city_id'], 'integer'],
            [['address'], 'string'],
            [['email'], 'email'],
            [['status', 'activity', 'company', 'type_ownership', 'firstName', 'surName', 'lastName', 'site'], 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => 'app\models\User'],
//            [['company'], 'unique', 'targetClass' => 'app\models\User'],
//            [['INN'], 'unique', 'targetClass' => 'app\models\User'],
            [['email', 'password', 'skype'], 'string', 'max' => 100],
            [['number'], 'string', 'max' => 20]
        ];
    }

    public function update()
    {
        if ($this->validate()) {
            $user = $this->_user;

            if (User::SCENARIO_PERSON == $user->status) {
                $user->setScenario($user->status);
            } elseif (User::SCENARIO_COMPANY == $user->status) {
                $user->setScenario($user->status);
            } else {
                return false;
            }
            $user->setAttributes($this->getAttributes());

            return $user->save();
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Status'),
            'city_id' => Yii::t('app', 'City'),
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
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'token' => Yii::t('app', 'Token'),
        ];
    }


}
