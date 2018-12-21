<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CourseEnrollmentHead;

/**
 * CourseEnrollmentHeadSearch represents the model behind the search form about `common\models\CourseEnrollmentHead`.
 */
class CourseEnrollmentHeadSearch extends CourseEnrollmentHead
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_enroll_head_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'course_enroll_head_class_id'], 'safe'],
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
        $query = CourseEnrollmentHead::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('courseEnrollHeadClass');
        $query->andFilterWhere([
            'course_enroll_head_id' => $this->course_enroll_head_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'std_class.class_name', $this->course_enroll_head_class_id]);

        return $dataProvider;
    }
}
