<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdInquiry;

/**
 * StdInquirySearch represents the model behind the search form about `common\models\StdInquiry`.
 */
class StdInquirySearch extends StdInquiry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_inquiry_id', 'std_obtained_marks', 'std_total_marks', 'created_by', 'updated_by'], 'integer'],
            [['std_inquiry_no', 'std_name', 'std_father_name', 'std_contact_no', 'std_father_contact_no', 'std_inquiry_date', 'std_intrested_class', 'std_previous_class', 'std_roll_no', 'std_percentage', 'refrence_name', 'refrence_contact_no', 'refrence_designation', 'std_address', 'created_at', 'updated_at'], 'safe'],
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
        $query = StdInquiry::find();

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
            'std_inquiry_id' => $this->std_inquiry_id,
            'std_inquiry_date' => $this->std_inquiry_date,
            'std_obtained_marks' => $this->std_obtained_marks,
            'std_total_marks' => $this->std_total_marks,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'std_inquiry_no', $this->std_inquiry_no])
            ->andFilterWhere(['like', 'std_name', $this->std_name])
            ->andFilterWhere(['like', 'std_father_name', $this->std_father_name])
            ->andFilterWhere(['like', 'std_contact_no', $this->std_contact_no])
            ->andFilterWhere(['like', 'std_father_contact_no', $this->std_father_contact_no])
            ->andFilterWhere(['like', 'std_intrested_class', $this->std_intrested_class])
            ->andFilterWhere(['like', 'std_previous_class', $this->std_previous_class])
            ->andFilterWhere(['like', 'std_roll_no', $this->std_roll_no])
            ->andFilterWhere(['like', 'std_percentage', $this->std_percentage])
            ->andFilterWhere(['like', 'refrence_name', $this->refrence_name])
            ->andFilterWhere(['like', 'refrence_contact_no', $this->refrence_contact_no])
            ->andFilterWhere(['like', 'refrence_designation', $this->refrence_designation])
            ->andFilterWhere(['like', 'std_address', $this->std_address]);

        return $dataProvider;
    }
}
