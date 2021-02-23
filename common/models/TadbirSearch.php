<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tadbir;

/**
 * TadbirSearch represents the model behind the search form of `common\models\Tadbir`.
 */
class TadbirSearch extends Tadbir
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'company_id'], 'integer'],
            [['tadbir_name', 'tadbir_content', 'tadbir_result', 'tadbir_date', 'tadbir_description', 'tadbir_status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Tadbir::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tadbir_date' => $this->tadbir_date,
            'company_id' => $this->company_id,
        ]);

        $query->andFilterWhere(['like', 'tadbir_name', $this->tadbir_name])
            ->andFilterWhere(['like', 'tadbir_content', $this->tadbir_content])
            ->andFilterWhere(['like', 'tadbir_result', $this->tadbir_result])
            ->andFilterWhere(['like', 'tadbir_description', $this->tadbir_description])
            ->andFilterWhere(['like', 'tadbir_status', $this->tadbir_status]);

        return $dataProvider;
    }
}
