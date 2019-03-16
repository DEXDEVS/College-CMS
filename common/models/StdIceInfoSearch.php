<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdIceInfo;

/**
 * StdIceInfoSearch represents the model behind the search form about `common\models\StdIceInfo`.
 */
class StdIceInfoSearch extends StdIceInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_ice_id', 'std_id', 'created_by', 'updated_by'], 'integer'],
            [['std_ice_name', 'std_ice_relation', 'std_ice_contact_no', 'std_ice_address', 'created_at', 'updated_at'], 'safe'],
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
        $query = StdIceInfo::find();

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
            'std_ice_id' => $this->std_ice_id,
            'std_id' => $this->std_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'std_ice_name', $this->std_ice_name])
            ->andFilterWhere(['like', 'std_ice_relation', $this->std_ice_relation])
            ->andFilterWhere(['like', 'std_ice_contact_no', $this->std_ice_contact_no])
            ->andFilterWhere(['like', 'std_ice_address', $this->std_ice_address]);

        return $dataProvider;
    }
}
