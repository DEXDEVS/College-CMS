<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EmpDesignation;

/**
 * EmpDesignationSearch represents the model behind the search form about `common\models\EmpDesignation`.
 */
class EmpDesignationSearch extends EmpDesignation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_designation_id', 'created_by', 'updated_by'], 'integer'],
            [['emp_designation', 'created_at', 'updated_at'], 'safe'],
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
        $query = EmpDesignation::find();

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
            'emp_designation_id' => $this->emp_designation_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'emp_designation', $this->emp_designation]);

        return $dataProvider;
    }
}
