<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $goods_id
 * @property integer $charge_city_id
 * @property integer $discharge_city_id
 * @property string $name
 * @property string $tare
 * @property double $goods_weight
 * @property double $goods_size
 * @property string $carcase
 * @property string $carcase_charge
 * @property double $capacity
 * @property double $size
 * @property string $work_preferences
 * @property string $status_charge
 * @property string $charge_start
 * @property string $charge_end
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
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['charge_city_id', 'discharge_city_id', 'name', 'tare', 'goods_weight', 'goods_size', 'carcase', 'carcase_charge', 'capacity', 'size', 'status_charge', 'term'], 'required'],
            [['charge_city_id', 'discharge_city_id', 'term', 'user_id'], 'integer'],
            [['goods_weight', 'goods_size', 'capacity', 'size', 'city_rate', 'intercity_rate', 'passage_rate'], 'number'],
            [['charge_start', 'charge_end', 'created_at', 'updated_at'], 'safe'],
            [['info'], 'string'],
            [['name', 'tare', 'carcase', 'carcase_charge', 'work_preferences', 'status_charge'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'goods_id' => Yii::t('app', 'Goods ID'),
            'charge_city_id' => Yii::t('app', 'Charge City ID'),
            'discharge_city_id' => Yii::t('app', 'Discharge City ID'),
            'name' => Yii::t('app', 'Name'),
            'tare' => Yii::t('app', 'Tare'),
            'goods_weight' => Yii::t('app', 'Goods Weight'),
            'goods_size' => Yii::t('app', 'Goods Size'),
            'carcase' => Yii::t('app', 'Carcase'),
            'carcase_charge' => Yii::t('app', 'Carcase Charge'),
            'capacity' => Yii::t('app', 'Capacity'),
            'size' => Yii::t('app', 'Size'),
            'work_preferences' => Yii::t('app', 'Work Preferences'),
            'status_charge' => Yii::t('app', 'Status Charge'),
            'charge_start' => Yii::t('app', 'Charge Start'),
            'charge_end' => Yii::t('app', 'Charge End'),
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
