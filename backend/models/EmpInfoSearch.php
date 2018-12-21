<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EmpInfo;

/**
 * EmpInfoSearch represents the model behind the search form about `common\models\EmpInfo`.
 */
class EmpInfoSearch extends EmpInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_id', 'emp_designation_id', 'emp_type_id', 'emp_branch_id', 'emp_passing_year', 'created_by', 'updated_by'], 'integer'],
            [['emp_name', 'emp_father_name', 'emp_cnic', 'emp_contact_no', 'emp_perm_address', 'emp_temp_address', 'emp_marital_status', 'emp_gender', 'emp_photo', 'group_by', 'emp_email', 'emp_qualification', 'emp_institute_name', 'degree_scan_copy', 'created_at', 'updated_at'], 'safe'],
            [['emp_salary'], 'number'],
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
        $query = EmpInfo::find();

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
            'emp_id' => $this->emp_id,
            'emp_designation_id' => $this->emp_designation_id,
            'emp_type_id' => $this->emp_type_id,
            'emp_branch_id' => $this->emp_branch_id,
            'emp_passing_year' => $this->emp_passing_year,
            'emp_salary' => $this->emp_salary,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'emp_name', $this->emp_name])
            ->andFilterWhere(['like', 'emp_father_name', $this->emp_father_name])
            ->andFilterWhere(['like', 'emp_cnic', $this->emp_cnic])
            ->andFilterWhere(['like', 'emp_contact_no', $this->emp_contact_no])
            ->andFilterWhere(['like', 'emp_perm_address', $this->emp_perm_address])
            ->andFilterWhere(['like', 'emp_temp_address', $this->emp_temp_address])
            ->andFilterWhere(['like', 'emp_marital_status', $this->emp_marital_status])
            ->andFilterWhere(['like', 'emp_gender', $this->emp_gender])
            ->andFilterWhere(['like', 'emp_photo', $this->emp_photo])
            ->andFilterWhere(['like', 'group_by', $this->group_by])
            ->andFilterWhere(['like', 'emp_email', $this->emp_email])
            ->andFilterWhere(['like', 'emp_qualification', $this->emp_qualification])
            ->andFilterWhere(['like', 'emp_institute_name', $this->emp_institute_name])
            ->andFilterWhere(['like', 'degree_scan_copy', $this->degree_scan_copy]);

        return $dataProvider;
    }
}
