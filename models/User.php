<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $status
 * @property string $city
 * @property string $activity
 * @property string $company
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
    const PERSON = 'Person';
    const COMPANY = 'Company';

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
            [['status', 'city', 'activity', 'company', 'INN', 'address', 'firstName', 'surName', 'password', 'number'], 'required'],
            [['INN'], 'integer'],
            [['address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status', 'city', 'activity', 'company', 'firstName', 'surName', 'lastName', 'site', 'authKey', 'token'], 'string', 'max' => 255],
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
            'status' => Yii::t('app', 'Статус'),
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

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }


    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->$password);
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
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
