<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MsgOfDay;

/**
 * MsgOfDaySearch represents the model behind the search form about `common\models\MsgOfDay`.
 */
class MsgOfDaySearch extends MsgOfDay
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['msg_of_day_id', 'created_by', 'updated_by'], 'integer'],
            [['msg_details', 'msg_user_type', 'created_at', 'updated_at', 'is_status'], 'safe'],
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
        $query = MsgOfDay::find();

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
            'msg_of_day_id' => $this->msg_of_day_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'msg_details', $this->msg_details])
            ->andFilterWhere(['like', 'msg_user_type', $this->msg_user_type])
            ->andFilterWhere(['like', 'is_status', $this->is_status]);

        return $dataProvider;
    }
}
