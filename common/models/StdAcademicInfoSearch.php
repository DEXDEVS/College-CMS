<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdAcademicInfo;

/**
 * StdAcademicInfoSearch represents the model behind the search form about `common\models\StdAcademicInfo`.
 */
class StdAcademicInfoSearch extends StdAcademicInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['academic_id', 'total_marks', 'obtained_marks', 'created_by', 'updated_by'], 'integer'],
            [['std_id', 'class_name_id', 'previous_class', 'passing_year', 'grades', 'Institute', 'created_at', 'updated_at'], 'safe'],
            [['percentage'], 'number'],
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
        $query = StdAcademicInfo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('std');
        $query->joinWith('className');
        $query->andFilterWhere([
            'academic_id' => $this->academic_id,
            'total_marks' => $this->total_marks,
            'obtained_marks' => $this->obtained_marks,
            'percentage' => $this->percentage,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'previous_class', $this->previous_class])
            ->andFilterWhere(['like', 'passing_year', $this->passing_year])
            ->andFilterWhere(['like', 'grades', $this->grades])
            ->andFilterWhere(['like', 'Institute', $this->Institute])
            ->andFilterWhere(['like', 'std_personal_info.std_name', $this->std_id])
            ->andFilterWhere(['like', 'std_class_name.class_name', $this->class_name_id]);

        return $dataProvider;
    }
}
