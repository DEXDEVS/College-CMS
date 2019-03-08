<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AccountRegister;

/**
 * AccountRegisterSearch represents the model behind the search form about `common\models\AccountRegister`.
 */
class AccountRegisterSearch extends AccountRegister
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_register_id', 'account_nature_id', 'created_by', 'updated_by'], 'integer'],
            [['account_name', 'account_description', 'created_at', 'updated_at'], 'safe'],
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
        $query = AccountRegister::find();

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
            'account_register_id' => $this->account_register_id,
            'account_nature_id' => $this->account_nature_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'account_name', $this->account_name])
            ->andFilterWhere(['like', 'account_description', $this->account_description]);

        return $dataProvider;
    }
}
