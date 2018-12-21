<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CourseEnrollmentDetail;

/**
 * CourseEnrollmentDetailSearch represents the model behind the search form about `common\models\CourseEnrollmentDetail`.
 */
class CourseEnrollmentDetailSearch extends CourseEnrollmentDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_enroll_detail_id', 'course_enroll_detail_head_id', 'course_enroll_detail_course_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = CourseEnrollmentDetail::find();

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
            'course_enroll_detail_id' => $this->course_enroll_detail_id,
            'course_enroll_detail_head_id' => $this->course_enroll_detail_head_id,
            'course_enroll_detail_course_id' => $this->course_enroll_detail_course_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
