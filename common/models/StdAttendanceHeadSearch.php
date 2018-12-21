<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdAttendanceHead;

/**
 * StdAttendanceHeadSearch represents the model behind the search form about `common\models\StdAttendanceHead`.
 */
class StdAttendanceHeadSearch extends StdAttendanceHead
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_atten_head_id', 'std_atten_head_class_id', 'std_atten_head_course_id', 'total_students', 'total_present_students', 'total_absent_students', 'Total_leave_students', 'created_by', 'updated_by'], 'integer'],
            [['datetime', 'created_at', 'updated_at'], 'safe'],
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
        $query = StdAttendanceHead::find();

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
            'std_atten_head_id' => $this->std_atten_head_id,
            'std_atten_head_class_id' => $this->std_atten_head_class_id,
            'std_atten_head_course_id' => $this->std_atten_head_course_id,
            'datetime' => $this->datetime,
            'total_students' => $this->total_students,
            'total_present_students' => $this->total_present_students,
            'total_absent_students' => $this->total_absent_students,
            'Total_leave_students' => $this->Total_leave_students,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
