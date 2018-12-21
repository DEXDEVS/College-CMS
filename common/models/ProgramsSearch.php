<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Programs;

/**
 * ProgramsSearch represents the model behind the search form about `common\models\Programs`.
 */
class ProgramsSearch extends Programs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['program_id', 'created_by', 'updated_by'], 'integer'],
            [['program_name', 'program_type_id', 'program_dept_id', 'program_description', 'program_no_semester', 'created_at', 'updated_at'], 'safe'],
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
        $query = Programs::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('programType');
        $query->joinWith('programDept');

        $query->andFilterWhere([
            'program_id' => $this->program_id,
        ]);

        $query->andFilterWhere(['like', 'program_name', $this->program_name])
            ->andFilterWhere(['like', 'program_description', $this->program_description])
            ->andFilterWhere(['like', 'program_no_semester', $this->program_no_semester])
            ->andFilterWhere(['like', 'program_type.program_type_name', $this->program_type_id])
            ->andFilterWhere(['like', 'departments.dept_name', $this->program_dept_id]);

        return $dataProvider;
    }
}
