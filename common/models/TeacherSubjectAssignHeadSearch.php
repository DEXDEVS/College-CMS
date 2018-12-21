<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TeacherSubjectAssignHead;

/**
 * TeacherSubjectAssignHeadSearch represents the model behind the search form about `common\models\TeacherSubjectAssignHead`.
 */
class TeacherSubjectAssignHeadSearch extends TeacherSubjectAssignHead
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_subject_assign_head_id', 'teacher_id', 'created_by', 'updated_by'], 'integer'],
            [['teacher_subject_assign_head_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = TeacherSubjectAssignHead::find();

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
            'teacher_subject_assign_head_id' => $this->teacher_subject_assign_head_id,
            'teacher_id' => $this->teacher_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'teacher_subject_assign_head_name', $this->teacher_subject_assign_head_name]);

        return $dataProvider;
    }
}
