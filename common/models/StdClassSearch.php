<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdClass;

/**
 * StdClassSearch represents the model behind the search form about `common\models\StdClass`.
 */
class StdClassSearch extends StdClass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_id',  'created_by', 'updated_by'], 'integer'],
            [['class_name_id', 'session_id', 'section_id', 'class_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = StdClass::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('className');
        $query->joinWith('session');
        $query->joinWith('section');
        $query->andFilterWhere([
            'class_id' => $this->class_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'class_name', $this->class_name])
            ->andFilterWhere(['like', 'std_class_name.class_name', $this->class_name_id])
            ->andFilterWhere(['like', 'std_sessions.session_name', $this->session_id])
            ->andFilterWhere(['like', 'std_sections.section_name', $this->section_id]);

        return $dataProvider;
    }
}
