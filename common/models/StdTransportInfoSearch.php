<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdTransportInfo;

/**
 * StdTransportInfoSearch represents the model behind the search form about `common\models\StdTransportInfo`.
 */
class StdTransportInfoSearch extends StdTransportInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_transport_id', 'created_by', 'updated_by'], 'integer'],
            [['std_transport_type', 'std_transport_std_id', 'std_transport_driver_contact_no', 'std_transport_vehicel_no', 'created_at', 'updated_at'], 'safe'],
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
        $query = StdTransportInfo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('stdTransportStd');

        $query->andFilterWhere([
            'std_transport_id' => $this->std_transport_id,
        ]);

        $query->andFilterWhere(['like', 'std_transport_type', $this->std_transport_type])
            ->andFilterWhere(['like', 'std_transport_driver_contact_no', $this->std_transport_driver_contact_no])
            ->andFilterWhere(['like', 'std_transport_vehicel_no', $this->std_transport_vehicel_no])
            ->andFilterWhere(['like', 'std_info.std_name', $this->std_transport_std_id]);

        return $dataProvider;
    }
}
