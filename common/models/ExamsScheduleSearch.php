<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ExamsSchedule;

/**
 * ExamsScheduleSearch represents the model behind the search form about `common\models\ExamsSchedule`.
 */
class ExamsScheduleSearch extends ExamsSchedule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['exam_schedule_id', 'exam_criteria_id', 'subject_id', 'emp_id', 'full_marks', 'passing_marks', 'created_by', 'updated_by'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
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
        $query = ExamsSchedule::find();

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
            'exam_schedule_id' => $this->exam_schedule_id,
            'exam_criteria_id' => $this->exam_criteria_id,
            'subject_id' => $this->subject_id,
            'emp_id' => $this->emp_id,
            'date' => $this->date,
            'full_marks' => $this->full_marks,
            'passing_marks' => $this->passing_marks,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
