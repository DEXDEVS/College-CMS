<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StdEnrollmentDetail;

/**
 * StdEnrollmentDetailSearch represents the model behind the search form about `common\models\StdEnrollmentDetail`.
 */
class StdEnrollmentDetailSearch extends StdEnrollmentDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['std_enroll_detail_id', 'created_by', 'updated_by'], 'integer'],
            [[ 'std_enroll_detail_head_id', 'std_enroll_detail_std_name','std_enroll_detail_std_id', 'created_at', 'updated_at'], 'safe'],
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
        $query = StdEnrollmentDetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('stdEnrollDetailHead');
        $query->joinWith('stdEnrollDetailStd');
        $query->andFilterWhere([
            'std_enroll_detail_id' => $this->std_enroll_detail_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

         $query->andFilterWhere(['like', 'std_enrollment_head.std_enroll_head_name', $this->std_enroll_detail_head_id])
            ->andFilterWhere(['like', 'std_personal_info.std_name', $this->std_enroll_detail_std_id]);

        return $dataProvider;
    }
}
