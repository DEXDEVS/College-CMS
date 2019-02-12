<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TeacherSubjectAssignDetail;

/**
 * TeacherSubjectAssignDetailSearch represents the model behind the search form about `common\models\TeacherSubjectAssignDetail`.
 */
class TeacherSubjectAssignDetailSearch extends TeacherSubjectAssignDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_subject_assign_detail_id', 'teacher_subject_assign_detail_head_id', 'class_id', 'subject_id', 'created_by', 'updated_by'], 'integer'],
            [['no_of_lecture', 'created_at', 'updated_at', 'delete_status'], 'safe'],
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
        $query = TeacherSubjectAssignDetail::find();

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
            'teacher_subject_assign_detail_id' => $this->teacher_subject_assign_detail_id,
            'teacher_subject_assign_detail_head_id' => $this->teacher_subject_assign_detail_head_id,
            'class_id' => $this->class_id,
            'subject_id' => $this->subject_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'no_of_lecture', $this->no_of_lecture])
            ->andFilterWhere(['like', 'delete_status', $this->delete_status]);

        return $dataProvider;
    }
}
