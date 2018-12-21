<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Timings;

/**
 * TimingsSearch represents the model behind the search form about `common\models\Timings`.
 */
class TimingsSearch extends Timings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timing_id', 'created_by', 'updated_by'], 'integer'],
            [['Timings', 'timing_description', 'created_at', 'updated_at'], 'safe'],
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
        $query = Timings::find();

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
            'timing_id' => $this->timing_id,
            'Timings' => $this->Timings,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'timing_description', $this->timing_description]);

        return $dataProvider;
    }
}
