<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ExamsCriteria;

/**
 * ExamsCriteriaSearch represents the model behind the search form about `common\models\ExamsCriteria`.
 */
class ExamsCriteriaSearch extends ExamsCriteria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exam_criteria_id', 'exam_category_id', 'std_enroll_head_id', 'created_by', 'updated_by'], 'integer'],
            [['exam_start_date', 'exam_end_date', 'exam_start_time', 'exam_end_time', 'exam_room', 'created_at', 'updated_at'], 'safe'],
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
        $query = ExamsCriteria::find();

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
            'exam_criteria_id' => $this->exam_criteria_id,
            'exam_category_id' => $this->exam_category_id,
            'std_enroll_head_id' => $this->std_enroll_head_id,
            'exam_start_date' => $this->exam_start_date,
            'exam_end_date' => $this->exam_end_date,
            'exam_start_time' => $this->exam_start_time,
            'exam_end_time' => $this->exam_end_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'exam_room', $this->exam_room]);

        return $dataProvider;
    }
}
