<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdPersonalInfo;

/**
 * StdPersonalInfoSearch represents the model behind the search form about `common\models\StdPersonalInfo`.
 */
class StdPersonalInfoSearch extends StdPersonalInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_id', 'created_by', 'updated_by'], 'integer'],
            [['std_reg_no', 'std_name', 'std_father_name', 'std_contact_no', 'std_DOB', 'std_gender', 'std_permanent_address', 'std_temporary_address', 'std_email', 'std_photo', 'std_b_form', 'std_district', 'std_religion', 'std_nationality', 'std_tehseel', 'status', 'academic_status', 'created_at', 'updated_at', 'delete_status'], 'safe'],
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
        $query = StdPersonalInfo::find();

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
            'std_DOB' => $this->std_DOB,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'std_reg_no', $this->std_reg_no])
            ->andFilterWhere(['like', 'std_name', $this->std_name])
            ->andFilterWhere(['like', 'std_father_name', $this->std_father_name])
            ->andFilterWhere(['like', 'std_contact_no', $this->std_contact_no])
            ->andFilterWhere(['like', 'std_gender', $this->std_gender])
            ->andFilterWhere(['like', 'std_permanent_address', $this->std_permanent_address])
            ->andFilterWhere(['like', 'std_temporary_address', $this->std_temporary_address])
            ->andFilterWhere(['like', 'std_email', $this->std_email])
            ->andFilterWhere(['like', 'std_photo', $this->std_photo])
            ->andFilterWhere(['like', 'std_b_form', $this->std_b_form])
            ->andFilterWhere(['like', 'std_district', $this->std_district])
            ->andFilterWhere(['like', 'std_religion', $this->std_religion])
            ->andFilterWhere(['like', 'std_nationality', $this->std_nationality])
            ->andFilterWhere(['like', 'std_tehseel', $this->std_tehseel])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'academic_status', $this->academic_status])
            ->andFilterWhere(['like', 'delete_status', $this->delete_status]);

        return $dataProvider;
    }
}
