<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdFeeInstallments;

/**
 * StdFeeInstallmentsSearch represents the model behind the search form about `common\models\StdFeeInstallments`.
 */
class StdFeeInstallmentsSearch extends StdFeeInstallments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fee_installment_id', 'std_fee_id', 'installment_no', 'created_by', 'updated_by'], 'integer'],
            [['installment_amount'], 'number'],
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
        $query = StdFeeInstallments::find();

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
            'fee_installment_id' => $this->fee_installment_id,
            'std_fee_id' => $this->std_fee_id,
            'installment_no' => $this->installment_no,
            'installment_amount' => $this->installment_amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
