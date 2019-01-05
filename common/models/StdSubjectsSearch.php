<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdSubjects;

/**
 * StdSubjectsSearch represents the model behind the search form about `common\models\StdSubjects`.
 */
class StdSubjectsSearch extends StdSubjects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_subject_id'], 'integer'],
            [['std_subject_name'], 'safe'],
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
        $query = StdSubjects::find();

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
            'std_subject_id' => $this->std_subject_id,
        ]);

        $query->andFilterWhere(['like', 'std_subject_name', $this->std_subject_name]);

        return $dataProvider;
    }
}
