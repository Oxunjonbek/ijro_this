<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Teacher;

/**
 * TeacherSearch represents the model behind the search form about `common\models\Teacher`.
 */
class TeacherSearch extends Teacher
{
    /**
     * @inheritdoc
     */
    // public $dateRange;
    public $dateBegin;
    public $dateEnd;
    public function rules()
    {
        return [
            [['id', 'school_id', 'gender_id'], 'integer'],
            [['full_name','birth_date','dateBegin','dateEnd'], 'safe'],
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
        $query = Teacher::find();

        // add conditions that should always apply here

        // $dataProvider = new ActiveDataProvider([
        //     'query' => $query,
        // ]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['birth_date'=>SORT_DESC, 'id'=>SORT_DESC]]
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
        if($this->dateBegin && $this->dateEnd){
            $query->andFilterWhere(['between', 'birth_date', $this->dateBegin, $this->dateEnd]);
        }
        // if($this->dateBegin){
        //     $query->andWhere("teacher.birth_date >='{$this->dateBegin}'");
        // }
        // if($this->dateEnd){
        //     $query->andWhere("teacher.birth_date <='{$this->dateEnd}'");
        // }
        //   $query->andFilterWhere([
        //     'id' => $this->id,
        //     'birth_date' => $this->birth_date,
        // ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'school_id' => $this->school_id,
            // 'birth_date' => $this->birth_date,
            'gender_id' => $this->gender_id,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name]);

        return $dataProvider;
    }
}
