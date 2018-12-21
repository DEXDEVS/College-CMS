<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AssignCourse;

/**
 * AssignCourseSearch represents the model behind the search form about `common\models\AssignCourse`.
 */
class AssignCourseSearch extends AssignCourse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assign_cousre_id', 'program_id', 'course_id'], 'integer'],
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
        $query = AssignCourse::find();

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
            'assign_cousre_id' => $this->assign_cousre_id,
            'program_id' => $this->program_id,
            'course_id' => $this->course_id,
        ]);

        return $dataProvider;
    }
}
