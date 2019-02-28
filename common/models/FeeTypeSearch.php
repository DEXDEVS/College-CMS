<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FeeType;

/**
 * FeeTypeSearch represents the model behind the search form about `common\models\FeeType`.
 */
class FeeTypeSearch extends FeeType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fee_type_id', 'created_by', 'updated_by'], 'integer'],
            [['fee_type_name', 'fee_type_description', 'created_at', 'updated_at'], 'safe'],
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
        $query = FeeType::find();

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
            'fee_type_id' => $this->fee_type_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'fee_type_name', $this->fee_type_name])
            ->andFilterWhere(['like', 'fee_type_description', $this->fee_type_description]);

        return $dataProvider;
    }
}
