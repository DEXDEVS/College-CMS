<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Batches;

/**
 * BatchesSearch represents the model behind the search form about `common\models\Batches`.
 */
class BatchesSearch extends Batches
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['batch_id', 'created_by', 'updated_by'], 'integer'],
            [['batch_name', 'batch_program_id' , 'batch_start_date', 'batch_end_date', 'batch_status', 'created_at', 'updated_at'], 'safe'],
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
        $query = Batches::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('batchProgram');

        $query->andFilterWhere([
            'batch_id' => $this->batch_id,
            'batch_start_date' => $this->batch_start_date,
            'batch_end_date' => $this->batch_end_date,
            
        ]);

        $query->andFilterWhere(['like', 'batch_name', $this->batch_name])
            ->andFilterWhere(['like', 'batch_status', $this->batch_status])
            ->andFilterWhere(['like', 'programs.program_name', $this->batch_program_id]);

        return $dataProvider;
    }
}
