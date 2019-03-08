<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdSessions;

/**
 * StdSessionsSearch represents the model behind the search form about `common\models\StdSessions`.
 */
class StdSessionsSearch extends StdSessions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['session_id', 'session_branch_id', 'installment_cycle', 'created_by', 'updated_by'], 'integer'],
            [['session_name', 'session_start_date', 'session_end_date', 'status', 'created_at', 'updated_at', 'delete_status'], 'safe'],
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
        $query = StdSessions::find();

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
            'session_id' => $this->session_id,
            'session_branch_id' => $this->session_branch_id,
            'session_start_date' => $this->session_start_date,
            'session_end_date' => $this->session_end_date,
            'installment_cycle' => $this->installment_cycle,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'session_name', $this->session_name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'delete_status', $this->delete_status]);

        return $dataProvider;
    }
}
