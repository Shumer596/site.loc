<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "transport".
 *
 * @property integer $transport_id
 * @property integer $charge_city_id
 * @property integer $discharge_city_id
 * @property string $carcase
 * @property string $carcase_charge
 * @property double $capacity
 * @property double $size
 * @property string $status_charge
 * @property string $charge_start
 * @property string $charge_end
 * @property string $work_preferences
 * @property double $city_rate
 * @property double $intercity_rate
 * @property double $passage_rate
 * @property string $info
 * @property integer $term
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 *
 * @property City $chargeCity
 * @property City $dischargeCity
 * @property User $user
 */
class Transport extends ActiveRecord
{
    const CANOPY = 'Canopy';
    const BROADSIDE = 'Broadside';
    const BCC = 'Broadside+Canopy+Comic';
    const BC = 'Broadside+Conic';
    const REFRIGERATOR = 'Refrigerator';
    const METAL = 'All-metal';
    const BOOTH = 'Booth';
    const VAN = 'Van';
    const ISOTHERMAL = 'Isothermal';
    const TRAWL_PLATFORM = 'Trawl platform';
    const TRAWL_LOW = 'Trawl low loader';
    const TIMBER = 'Timber';
    const EXCAVATOR = 'Excavator';
    const WHEEL_LOADER = 'Wheel loader';
    const TIPPER = 'Tipper';
    const TRUCK_MIXER = 'Truck mixer';
    const TRANSPORTER = 'Transporter';
    const ANCHOR_TRUCK = 'Anchor truck';

    const BACK = 'Back';
    const LATERAL = 'Lateral';
    const UPPER = 'Upper';


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['charge_city_id', 'discharge_city_id', 'carcase', 'carcase_charge', 'capacity', 'size', 'status_charge', 'term'], 'required'],
            [['charge_city_id', 'discharge_city_id', 'term', 'user_id'], 'integer'],
            [['capacity', 'size', 'city_rate', 'intercity_rate', 'passage_rate'], 'number'],
            [['charge_start', 'charge_end', 'created_at', 'updated_at'], 'safe'],
            [['info'], 'string'],
            [['carcase', 'carcase_charge', 'status_charge', 'work_preferences'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transport_id' => Yii::t('app', 'Transport ID'),
            'charge_city_id' => Yii::t('app', 'Charge City'),
            'discharge_city_id' => Yii::t('app', 'Discharge City'),
            'carcase' => Yii::t('app', 'Carcase'),
            'carcase_charge' => Yii::t('app', 'Carcase Charge'),
            'capacity' => Yii::t('app', 'Capacity'),
            'size' => Yii::t('app', 'Size'),
            'status_charge' => Yii::t('app', 'Status Charge'),
            'charge_start' => Yii::t('app', 'Charge Start'),
            'charge_end' => Yii::t('app', 'Charge End'),
            'work_preferences' => Yii::t('app', 'Work Preferences'),
            'city_rate' => Yii::t('app', 'City Rate'),
            'intercity_rate' => Yii::t('app', 'Intercity Rate'),
            'passage_rate' => Yii::t('app', 'Passage Rate'),
            'info' => Yii::t('app', 'Info'),
            'term' => Yii::t('app', 'Term'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChargeCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'charge_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDischargeCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'discharge_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
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

    public static function getCarCase(){

        return [
            self::CANOPY => Yii::t('app', 'Canopy'),
            self::BROADSIDE =>Yii::t('app', 'Broadside'),
            self::BCC =>Yii::t('app', 'Broadside+Canopy+Conic'),
            self::BC =>Yii::t('app', 'Broadside+Canopy'),
            self::REFRIGERATOR =>Yii::t('app', 'Refrigerator'),
            self::METAL =>Yii::t('app', 'All-metal'),
            self::BOOTH =>Yii::t('app', 'Booth'),
            self::VAN =>Yii::t('app', 'Van'),
            self::ISOTHERMAL =>Yii::t('app', 'Isothermal'),
            self::TRAWL_PLATFORM =>Yii::t('app', 'Trawl platform'),
            self::TRAWL_LOW =>Yii::t('app', 'Trawl low loader'),
            self::TIMBER =>Yii::t('app', 'Timber'),
            self::EXCAVATOR =>Yii::t('app', 'Excavator'),
            self::WHEEL_LOADER =>Yii::t('app', 'Wheel loader'),
            self::TIPPER =>Yii::t('app', 'Tipper'),
            self::TRUCK_MIXER =>Yii::t('app', 'Truck mixer'),
            self::TRANSPORTER =>Yii::t('app', 'Transporter'),
            self::ANCHOR_TRUCK =>Yii::t('app', 'Anchor truck'),
        ];
    }

    public static function getCarCaseCharge(){

        return [

            self::BACK =>Yii::t('app', 'Back'),
            self::LATERAL =>Yii::t('app', 'Lateral'),
            self::UPPER =>Yii::t('app', 'Upper'),

        ];
    }
}
