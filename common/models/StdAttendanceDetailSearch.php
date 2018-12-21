<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdAttendanceDetail;

/**
 * StdAttendanceDetailSearch represents the model behind the search form about `common\models\StdAttendanceDetail`.
 */
class StdAttendanceDetailSearch extends StdAttendanceDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_atten_detail_id', 'std_atten_detail_head_id', 'std_atten_detail_std_id', 'std_roll_no', 'std_present', 'std_absent', 'std_leave', 'created_by', 'updated_by'], 'integer'],
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
        $query = StdAttendanceDetail::find();

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
            'std_atten_detail_id' => $this->std_atten_detail_id,
            'std_atten_detail_head_id' => $this->std_atten_detail_head_id,
            'std_atten_detail_std_id' => $this->std_atten_detail_std_id,
            'std_roll_no' => $this->std_roll_no,
            'std_present' => $this->std_present,
            'std_absent' => $this->std_absent,
            'std_leave' => $this->std_leave,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        return $dataProvider;
    }
}
