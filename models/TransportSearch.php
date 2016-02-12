<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transport;

/**
 * TransportSearch represents the model behind the search form about `app\models\Transport`.
 */
class TransportSearch extends Transport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transport_id', 'charge_city_id', 'discharge_city_id', 'term', 'user_id'], 'integer'],
            [['carcase', 'carcase_charge', 'status_charge', 'charge_start', 'charge_end', 'work_preferences', 'info', 'created_at', 'updated_at'], 'safe'],
            [['capacity', 'size', 'city_rate', 'intercity_rate', 'passage_rate'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Transport::find();
        $query->with('chargeCity');
        $query->joinWith('chargeCity');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'transport_id' => $this->transport_id,
            'city.name' => $this->charge_city_id,
            'discharge_city_id' => $this->discharge_city_id,
            'capacity' => $this->capacity,
            'size' => $this->size,
            'charge_start' => $this->charge_start,
            'charge_end' => $this->charge_end,
            'city_rate' => $this->city_rate,
            'intercity_rate' => $this->intercity_rate,
            'passage_rate' => $this->passage_rate,
            'term' => $this->term,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
        ]);

        $query
            ->andFilterWhere(['like', 'carcase', $this->carcase])
            ->andFilterWhere(['like', 'carcase_charge', $this->carcase_charge])
            ->andFilterWhere(['like', 'status_charge', $this->status_charge])
            ->andFilterWhere(['like', 'work_preferences', $this->work_preferences])
            ->andFilterWhere(['like', 'info', $this->info]);

        return $dataProvider;
    }
}
