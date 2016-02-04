<?php

namespace app\models;

use Yii;
use yii\base\Model;


class TransportForm extends Model
{
    public $transport_id;
    public $charge_city_id;
    public $discharge_city_id;
    public $carcase;
    public $carcase_charge;
    public $capacity;
    public $size;
    public $status_charge;
    public $charge_start;
    public $charge_end;
    public $work_preferences;
    public $city_rate;
    public $intercity_rate;
    public $passage_rate;
    public $info;
    public $term;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['charge_city_id', 'discharge_city_id', 'carcase', 'carcase_charge', 'capacity', 'size', 'status_charge', 'term'], 'required'],
            [['charge_city_id', 'discharge_city_id', 'term'], 'integer'],
            [['capacity', 'size', 'city_rate', 'intercity_rate', 'passage_rate'], 'number'],
            [['charge_start', 'charge_end'], 'safe'],
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
        ];
    }

    public function addTransport()
    {
        if ($this->validate()) {
            $transport = new Transport();
            $transport->setAttributes($this->getAttributes());
            return $transport->save();
        }
    }


}
