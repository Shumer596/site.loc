<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Goods;

/**
 * GoodsSearch represents the model behind the search form about `app\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'charge_city_id', 'discharge_city_id', 'term', 'user_id'], 'integer'],
            [['name', 'tare', 'carcase', 'carcase_charge', 'work_preferences', 'status_charge', 'charge_start', 'charge_end', 'info', 'created_at', 'updated_at'], 'safe'],
            [['goods_weight', 'goods_size', 'capacity', 'size', 'city_rate', 'intercity_rate', 'passage_rate'], 'number'],
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
        $query = Goods::find();

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
            'goods_id' => $this->goods_id,
            'charge_city_id' => $this->charge_city_id,
            'discharge_city_id' => $this->discharge_city_id,
            'goods_weight' => $this->goods_weight,
            'goods_size' => $this->goods_size,
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

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tare', $this->tare])
            ->andFilterWhere(['like', 'carcase', $this->carcase])
            ->andFilterWhere(['like', 'carcase_charge', $this->carcase_charge])
            ->andFilterWhere(['like', 'work_preferences', $this->work_preferences])
            ->andFilterWhere(['like', 'status_charge', $this->status_charge])
            ->andFilterWhere(['like', 'info', $this->info]);

        return $dataProvider;
    }
}
