<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\School3;

/**
 * School3Search represents the model behind the search form about `common\models\School3`.
 */
class School3Search extends School3
{
   
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'town_id'], 'integer'],
            [['name', 'address', 'phone', 'location'], 'safe'],
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
        $query = School3::find();

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

        // if($this->date){
        //     $dateBegin = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$3-$2-$1', $this->date);
        //     $dateEnd = preg_replace('/(\d{2}).(\d{2}).(\d{1,4}) - (\d{2}).(\d{2}).(\d{1,4})/', '$6-$5-$4', $this->date);
        //     $query->andWhere("date >='{$dateBegin}'");
        //     $query->andWhere("date <='{$dateEnd}'");
        // }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'town_id' => $this->town_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}
