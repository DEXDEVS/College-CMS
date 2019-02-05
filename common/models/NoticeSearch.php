<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Notice;

/**
 * NoticeSearch represents the model behind the search form about `common\models\Notice`.
 */
class NoticeSearch extends Notice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['notice_id', 'created_by', 'updated_by'], 'integer'],
            [['notice_title', 'notice_description', 'notice_start', 'notice_end', 'notice_user_type', 'created_at', 'updated_at', 'is_status'], 'safe'],
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
        $query = Notice::find();

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
            'notice_id' => $this->notice_id,
            'notice_start' => $this->notice_start,
            'notice_end' => $this->notice_end,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'notice_title', $this->notice_title])
            ->andFilterWhere(['like', 'notice_description', $this->notice_description])
            ->andFilterWhere(['like', 'notice_user_type', $this->notice_user_type])
            ->andFilterWhere(['like', 'is_status', $this->is_status]);

        return $dataProvider;
    }
}
