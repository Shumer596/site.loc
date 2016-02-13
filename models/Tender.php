<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tender".
 *
 * @property integer $tender_id
 * @property string $name
 * @property string $info
 * @property string $file
 * @property string $date_start
 * @property string $date_end
 * @property double $price
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 *
 * @property User $user
 */
class Tender extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tender';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'info', 'file'], 'required'],
            [['info', 'file'], 'string'],
            [['date_start', 'date_end', 'created_at', 'updated_at'], 'safe'],
            [['price'], 'number'],
            [['user_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tender_id' => Yii::t('app', 'Tender ID'),
            'name' => Yii::t('app', 'Name'),
            'info' => Yii::t('app', 'Info'),
            'file' => Yii::t('app', 'File'),
            'date_start' => Yii::t('app', 'Date Start'),
            'date_end' => Yii::t('app', 'Date End'),
            'price' => Yii::t('app', 'Price'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
