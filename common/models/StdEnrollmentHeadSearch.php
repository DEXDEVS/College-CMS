<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdEnrollmentHead;

/**
 * StdEnrollmentHeadSearch represents the model behind the search form about `common\models\StdEnrollmentHead`.
 */
class StdEnrollmentHeadSearch extends StdEnrollmentHead
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_enroll_head_id', 'class_name_id', 'session_id', 'section_id', 'created_by', 'updated_by'], 'integer'],
            [['std_enroll_head_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = StdEnrollmentHead::find();
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
                'std_enroll_head_id' => $this->std_enroll_head_id,
                'class_name_id' => $this->class_name_id,
                'session_id' => $this->session_id,
                'section_id' => $this->section_id,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'created_by' => $this->created_by,
                'updated_by' => $this->updated_by,
            ]);

            $query->andFilterWhere(['like', 'std_enroll_head_name', $this->std_enroll_head_name]);

            return $dataProvider;
    }
}
