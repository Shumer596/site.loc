<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $status
 * @property string $city_id
 * @property string $activity
 * @property string $company
 * @property string $type_ownership
 * @property integer $INN
 * @property string $address
 * @property string $firstName
 * @property string $surName
 * @property string $lastName
 * @property string $email
 * @property string $password
 * @property string $number
 * @property string $site
 * @property string $skype
 * @property string $created_at
 * @property string $updated_at
 * @property string $authKey
 * @property string $token
 *
 * @property Goods[] $goods
 * @property Tender[] $tenders
 * @property Transport[] $transports
 */
class User extends ActiveRecord implements IdentityInterface
{
    const SCENARIO_PERSON = 'Person';
    const SCENARIO_COMPANY = 'Company';

    const CARRIER = 'Carrier';
    const FORWARDER = 'Forwarder';
    const SNIPER = 'Shipper';
    const DISPATCHER = 'Dispatcher';
    const FORWARDER_CARRIER = 'Forwarder-carrier';
    const SNIPER_CARRIER = 'Shipper-carrier';
    const INSURANCE_AGENT = 'Insurance agent';

    const PLC = 'PLC';
    const LTD = 'Ltd';
    const INC = 'Inc.';
    const CORP = 'Corp.';
    const LLC = 'LLC';
    const LDC = 'LDC';
    const IBC = 'IBC';
    const LP = 'LP';
    const IC = 'IC';

    /**
     * @return array of activity list for Individual user
     */
    public static function getActivity()
    {
        return [
            self::CARRIER => Yii::t('app', 'Carrier'),
            self::FORWARDER => Yii::t('app', 'Forwarder'),
            self::SNIPER => Yii::t('app', 'Shipper'),
            self::DISPATCHER => Yii::t('app', 'Dispatcher'),
            self::FORWARDER_CARRIER => Yii::t('app', 'Forwarder-carrier'),
            self::SNIPER_CARRIER => Yii::t('app', 'Shipper-carrier'),
            self::INSURANCE_AGENT => Yii::t('app', 'Insurance agent')
        ];
    }

    /**
     * @return array of activity list for Company  user
     */
    public static function getCompanyActivity()
    {
        return [
            self::CARRIER => Yii::t('app', 'Carrier(company)'),
            self::FORWARDER => Yii::t('app', 'Forwarder(company)'),
            self::SNIPER => Yii::t('app', 'Shipper(company)'),
            self::DISPATCHER => Yii::t('app', 'Dispatcher(company)'),
            self::FORWARDER_CARRIER => Yii::t('app', 'Forwarder-carrier(company)'),
            self::SNIPER_CARRIER => Yii::t('app', 'Shipper-carrier(company)'),
            self::INSURANCE_AGENT => Yii::t('app', 'Insurance company')
        ];
    }

    /**
     * @return array of ownerships list
     */
    public static function getOwnerShip()
    {
        return [
            User::PLC => Yii::t('app', 'PLC'),
            User::LTD => Yii::t('app', 'Ltd'),
            User::INC => Yii::t('app', 'Inc.'),
            User::CORP => Yii::t('app', 'Corp.'),
            User::LLC => Yii::t('app', 'LLC'),
            User::LDC => Yii::t('app', 'LDC'),
            User::IBC => Yii::t('app', 'IBC'),
            User::IC => Yii::t('app', 'IC'),
            User::LP => Yii::t('app', 'LP'),
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_PERSON] = [
            'status', 'activity', 'city_id', 'surName', 'firstName', 'lastName', 'number', 'skype', 'email', 'password'
        ];
        $scenarios[self::SCENARIO_COMPANY] = ['status', 'activity', 'company', 'type_ownership', 'INN', 'city_id', 'address', 'surName', 'firstName', 'lastName', 'number', 'site', 'skype', 'email', 'password'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'activity', 'city_id', 'surName', 'firstName', 'number', 'email', 'password'], 'required', 'on' => self::SCENARIO_PERSON],
            [['status', 'activity', 'company', 'type_ownership', 'INN', 'city_id', 'address', 'firstName', 'lastName', 'number', 'email', 'password'], 'required', 'on' => self::SCENARIO_COMPANY],
            [['INN','city_id'], 'integer'],
            [['address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status', 'activity', 'company', 'type_ownership', 'firstName', 'surName', 'lastName', 'site', 'authKey', 'token'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['email', 'password', 'skype'], 'string', 'max' => 100],
            [['number'], 'string', 'max' => 20]
        ];
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

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }


    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Goods::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenders()
    {
        return $this->hasMany(Tender::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransports()
    {
        return $this->hasMany(Transport::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }


    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username(email)
     *
     * @param string $username
     * @return null|static
     */
    public static function findByUsername($username)
    {
        return self::findOne(['email' => $username]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
