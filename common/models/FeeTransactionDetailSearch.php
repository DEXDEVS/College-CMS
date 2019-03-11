<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FeeTransactionDetail;

/**
 * FeeTransactionDetailSearch represents the model behind the search form about `common\models\FeeTransactionDetail`.
 */
class FeeTransactionDetailSearch extends FeeTransactionDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fee_trans_detail_id', 'fee_trans_detail_head_id', 'fee_type_id', 'created_by', 'updated_by'], 'integer'],
            [['fee_amount', 'collected_fee_amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = FeeTransactionDetail::find();

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
            'fee_trans_detail_id' => $this->fee_trans_detail_id,
            'fee_trans_detail_head_id' => $this->fee_trans_detail_head_id,
            'fee_type_id' => $this->fee_type_id,
            'fee_amount' => $this->fee_amount,
            'collected_fee_amount' => $this->collected_fee_amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        

        return $dataProvider;
    }
}
