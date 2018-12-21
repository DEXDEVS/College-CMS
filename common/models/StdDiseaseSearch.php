<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdDisease;

/**
 * StdDiseaseSearch represents the model behind the search form about `common\models\StdDisease`.
 */
class StdDiseaseSearch extends StdDisease
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_disease_id',  'created_by', 'updated_by'], 'integer'],
            [['std_disease_level', 'std_disease_std_id', 'std_blood_group', 'std_dr_name', 'std_dr_contact_no', 'created_at', 'updated_at'], 'safe'],
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
        $query = StdDisease::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('stdDiseaseStd');

        $query->andFilterWhere([
            'std_disease_id' => $this->std_disease_id,
        ]);

        $query->andFilterWhere(['like', 'std_disease_level', $this->std_disease_level])
            ->andFilterWhere(['like', 'std_blood_group', $this->std_blood_group])
            ->andFilterWhere(['like', 'std_dr_name', $this->std_dr_name])
            ->andFilterWhere(['like', 'std_dr_contact_no', $this->std_dr_contact_no])
            ->andFilterWhere(['like', 'std_info.std_name', $this->std_disease_std_id]);

        return $dataProvider;
    }
}
