<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdGuardianInfo;

/**
 * StdGuardianInfoSearch represents the model behind the search form about `common\models\StdGuardianInfo`.
 */
class StdGuardianInfoSearch extends StdGuardianInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_guardian_info_id', 'std_id', 'guardian_monthly_income', 'created_by', 'updated_by'], 'integer'],
            [['guardian_name', 'guardian_relation', 'guardian_cnic', 'guardian_email', 'guardian_contact_no_1', 'guardian_contact_no_2', 'guardian_occupation', 'guardian_designation', 'created_at', 'updated_at'], 'safe'],
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
        $query = StdGuardianInfo::find();

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
            'std_guardian_info_id' => $this->std_guardian_info_id,
            'std_id' => $this->std_id,
            'guardian_monthly_income' => $this->guardian_monthly_income,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'guardian_name', $this->guardian_name])
            ->andFilterWhere(['like', 'guardian_relation', $this->guardian_relation])
            ->andFilterWhere(['like', 'guardian_cnic', $this->guardian_cnic])
            ->andFilterWhere(['like', 'guardian_email', $this->guardian_email])
            ->andFilterWhere(['like', 'guardian_contact_no_1', $this->guardian_contact_no_1])
            ->andFilterWhere(['like', 'guardian_contact_no_2', $this->guardian_contact_no_2])
            ->andFilterWhere(['like', 'guardian_occupation', $this->guardian_occupation])
            ->andFilterWhere(['like', 'guardian_designation', $this->guardian_designation]);

        return $dataProvider;
    }
}
