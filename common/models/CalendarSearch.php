<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Calendar;

/**
 * CalendarSearch represents the model behind the search form of `common\models\Calendar`.
 */
class CalendarSearch extends Calendar
{
    public function search($params)
    {
        $query = Calendar::find();
        // ->where(['user_id'=>Yii::$app->user->getId()])

        $dataProvider = new ActiveDataProvider([
             'query' => $query,
             'pagination' => ['pageSize' => 30],
             'sort'=> ['defaultOrder' => ['start'=>SORT_DESC]]
         ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->calories,
            'val' => $this->peak_heartrate,
            'tadbir_id' => $this->tadbir_id,
        ]);

        return $dataProvider;
    }
}
// class CalendarSearch extends Calendar
// {
//     /**
//      * {@inheritdoc}
//      */
//     public function rules()
//     {
//         return [
//             [['id', 'val', 'tadbir_id'], 'integer'],
//             [['date'], 'safe'],
//         ];
//     }

//     /**
//      * {@inheritdoc}
//      */
//     public function scenarios()
//     {
//         // bypass scenarios() implementation in the parent class
//         return Model::scenarios();
//     }

//     /**
//      * Creates data provider instance with search query applied
//      *
//      * @param array $params
//      *
//      * @return ActiveDataProvider
//      */
//     public function search($params)
//     {
//         $query = Calendar::find();

//         // add conditions that should always apply here

//         $dataProvider = new ActiveDataProvider([
//             'query' => $query,
//         ]);

//         $this->load($params);

//         if (!$this->validate()) {
//             // uncomment the following line if you do not want to return any records when validation fails
//             // $query->where('0=1');
//             return $dataProvider;
//         }

//         // grid filtering conditions
//         $query->andFilterWhere([
//             'id' => $this->id,
//             'date' => $this->date,
//             'val' => $this->val,
//             'tadbir_id' => $this->tadbir_id,
//         ]);

//         return $dataProvider;
//     }
// }
