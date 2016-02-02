<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
            'charge_city_id' => Yii::t('app', 'Charge City ID'),
            'discharge_city_id' => Yii::t('app', 'Discharge City ID'),
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
}
