<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MarksWeitage;

/**
 * MarksWeitageSearch represents the model behind the search form about `common\models\MarksWeitage`.
 */
class MarksWeitageSearch extends MarksWeitage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['marks_weitage_id', 'std_enroll_head_id', 'subject_id', 'presentation', 'assignment', 'attendance', 'dressing', 'theory', 'practical', 'created_by', 'updated_by'], 'integer'],
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
        $query = MarksWeitage::find();

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
            'marks_weitage_id' => $this->marks_weitage_id,
            'std_enroll_head_id' => $this->std_enroll_head_id,
            'subject_id' => $this->subject_id,
            'presentation' => $this->presentation,
            'assignment' => $this->assignment,
            'attendance' => $this->attendance,
            'dressing' => $this->dressing,
            'theory' => $this->theory,
            'practical' => $this->practical,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
