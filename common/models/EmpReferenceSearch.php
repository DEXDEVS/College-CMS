<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EmpReference;

/**
 * EmpReferenceSearch represents the model behind the search form about `common\models\EmpReference`.
 */
class EmpReferenceSearch extends EmpReference
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_ref_id', 'emp_id', 'ref_contact_no', 'ref_cnic'], 'integer'],
            [['ref_name', 'ref_designation'], 'safe'],
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
        $query = EmpReference::find();

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
            'emp_ref_id' => $this->emp_ref_id,
            'emp_id' => $this->emp_id,
            'ref_contact_no' => $this->ref_contact_no,
            'ref_cnic' => $this->ref_cnic,
        ]);

        $query->andFilterWhere(['like', 'ref_name', $this->ref_name])
            ->andFilterWhere(['like', 'ref_designation', $this->ref_designation]);

        return $dataProvider;
    }
}
