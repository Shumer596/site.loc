<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "city".
 *
 * @property integer $city_id
 * @property integer $region_id
 * @property string $name
 * @property string $phone_code
 *
 * @property Region $region
 */
class City extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['phone_code'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => Yii::t('app', 'City ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'name' => Yii::t('app', 'Name'),
            'phone_code' => Yii::t('app', 'Phone Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['region_id' => 'region_id']);
    }

    /**
     * Finds city.name & region.name by city.id
     *
     * @param $id
     * @return string
     */
    public static function findById($id)
    {
        $data = self::find()
            ->select(['CONCAT(city.name,\', \', region.name) as label'])
            ->innerJoin('region', 'city.region_id = region.region_id')
            ->andFilterWhere(['=', 'city_id', $id])
            ->asArray()
            ->one();
        $string = array_shift($data);
        return $string;
    }
}
