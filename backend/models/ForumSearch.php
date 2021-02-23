<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Forum;

/**
 * ForumSearch represents the model behind the search form about `common\models\Forum`.
 */
class ForumSearch extends Forum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'forum_category_id', 'user_id', 'reply_id'], 'integer'],
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
        $query = Forum::find();

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
            'forum_category_id' => $this->forum_category_id,
            'user_id' => $this->user_id,
            'reply_id' => $this->reply_id,
        ]);

        return $dataProvider;
    }
}
