<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdInfo;

/**
 * StdInfoSearch represents the model behind the search form about `common\models\StdInfo`.
 */
class StdInfoSearch extends StdInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_id', 'created_by', 'updated_by'], 'integer'],
            [['std_reg_no', 'std_first_name', 'std_last_name', 'std_father_name', 'std_photo', 'std_cnic', 'std_contact_no', 'std_email', 'std_p_address', 'std_t_address', 'std_emergency_person_name', 'std_emergency_contact_person_no', 'std_dob', 'std_nationality', 'std_country', 'std_district', 'std_province', 'std_religion', 'std_gender', 'std_serious_disease', 'std_transport_required', 'created_at', 'updated_at'], 'safe'],
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
        $query = StdInfo::find();

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
            'std_id' => $this->std_id,
            'std_dob' => $this->std_dob,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'std_reg_no', $this->std_reg_no])
            ->andFilterWhere(['like', 'std_first_name', $this->std_first_name])
            ->andFilterWhere(['like', 'std_last_name', $this->std_last_name])
            ->andFilterWhere(['like', 'std_father_name', $this->std_father_name])
            ->andFilterWhere(['like', 'std_photo', $this->std_photo])
            ->andFilterWhere(['like', 'std_cnic', $this->std_cnic])
            ->andFilterWhere(['like', 'std_contact_no', $this->std_contact_no])
            ->andFilterWhere(['like', 'std_email', $this->std_email])
            ->andFilterWhere(['like', 'std_p_address', $this->std_p_address])
            ->andFilterWhere(['like', 'std_t_address', $this->std_t_address])
            ->andFilterWhere(['like', 'std_emergency_person_name', $this->std_emergency_person_name])
            ->andFilterWhere(['like', 'std_emergency_contact_person_no', $this->std_emergency_contact_person_no])
            ->andFilterWhere(['like', 'std_nationality', $this->std_nationality])
            ->andFilterWhere(['like', 'std_country', $this->std_country])
            ->andFilterWhere(['like', 'std_district', $this->std_district])
            ->andFilterWhere(['like', 'std_province', $this->std_province])
            ->andFilterWhere(['like', 'std_religion', $this->std_religion])
            ->andFilterWhere(['like', 'std_gender', $this->std_gender])
            ->andFilterWhere(['like', 'std_serious_disease', $this->std_serious_disease])
            ->andFilterWhere(['like', 'std_transport_required', $this->std_transport_required]);

        return $dataProvider;
    }
}
