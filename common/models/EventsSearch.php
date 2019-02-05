<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Events;

/**
 * EventsSearch represents the model behind the search form about `common\models\Events`.
 */
class EventsSearch extends Events
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'created_by', 'updated_by'], 'integer'],
            [['event_title', 'event_detail', 'event_venue', 'event_start_datetime', 'event_end_datetime', 'created_at', 'updated_at', 'is_status'], 'safe'],
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
        $query = Events::find();

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
            'event_id' => $this->event_id,
            'event_start_datetime' => $this->event_start_datetime,
            'event_end_datetime' => $this->event_end_datetime,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'event_title', $this->event_title])
            ->andFilterWhere(['like', 'event_detail', $this->event_detail])
            ->andFilterWhere(['like', 'event_venue', $this->event_venue])
            ->andFilterWhere(['like', 'is_status', $this->is_status]);

        return $dataProvider;
    }
}
