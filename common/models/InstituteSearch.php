<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Institute;

/**
 * InstituteSearch represents the model behind the search form about `common\models\Institute`.
 */
class InstituteSearch extends Institute
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['institute_id', 'institute_account_no', 'created_by', 'updated_by'], 'integer'],
            [['institute_name', 'institute_logo', 'created_at', 'updated_at'], 'safe'],
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
        $query = Institute::find();

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
            'institute_id' => $this->institute_id,
            'institute_account_no' => $this->institute_account_no,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'institute_name', $this->institute_name])
            ->andFilterWhere(['like', 'institute_logo', $this->institute_logo]);

        return $dataProvider;
    }
}
