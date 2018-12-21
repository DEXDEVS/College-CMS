<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdAttendance;

/**
 * StdAttendanceSearch represents the model behind the search form about `common\models\StdAttendance`.
 */
class StdAttendanceSearch extends StdAttendance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_attend_id', 'teacher_id', 'class_name_id','session_id','section_id', 'student_id'], 'integer'],
            [['date', 'status'], 'safe'],
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
        $query = StdAttendance::find();

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
            'std_attend_id' => $this->std_attend_id,
            'teacher_id' => $this->teacher_id,
            'class_name_id' => $this->class_name_id,
            'session_id' => $this->session_id,
            'session_id' => $this->session_id,
            'date' => $this->date,
            'student_id' => $this->student_id,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
