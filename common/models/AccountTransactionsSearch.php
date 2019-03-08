<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AccountTransactions;

/**
 * AccountTransactionsSearch represents the model behind the search form about `common\models\AccountTransactions`.
 */
class AccountTransactionsSearch extends AccountTransactions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trans_id', 'account_register_id', 'created_by', 'updated_by'], 'integer'],
            [['account_nature', 'date', 'description', 'created_at', 'updated_at'], 'safe'],
            [['total_amount'], 'number'],
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
        $query = AccountTransactions::find();

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
            'trans_id' => $this->trans_id,
            'account_register_id' => $this->account_register_id,
            'date' => $this->date,
            'total_amount' => $this->total_amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'account_nature', $this->account_nature])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
