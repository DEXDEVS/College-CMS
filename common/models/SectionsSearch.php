<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sections;

/**
 * SectionsSearch represents the model behind the search form about `common\models\Sections`.
 */
class SectionsSearch extends Sections
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section_id', 'created_by', 'updated_by'], 'integer'],
            [['section_name', 'section_program_id', 'section_batch_id', 'created_at', 'updated_at'], 'safe'],
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
        $query = Sections::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('sectionProgram');
        $query->joinWith('sectionBatch');

        $query->andFilterWhere([
            'section_id' => $this->section_id,
            
        ]);

        $query->andFilterWhere(['like', 'section_name', $this->section_name])
            ->andFilterWhere(['like', 'programs.program_name', $this->section_program_id])
            ->andFilterWhere(['like', 'batches.batch_name', $this->section_batch_id]);

        return $dataProvider;
    }
}
