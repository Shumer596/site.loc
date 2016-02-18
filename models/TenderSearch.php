<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tender;

/**
 * TenderSearch represents the model behind the search form about `app\models\Tender`.
 */
class TenderSearch extends Tender
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tender_id', 'user_id'], 'integer'],
            [['name', 'info', 'file', 'date_start', 'date_end', 'created_at', 'updated_at'], 'safe'],
            [['price'], 'number'],
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
        $query = Tender::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => 2,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'tender_id' => $this->tender_id,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}
