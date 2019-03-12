<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InstituteName;

/**
 * InstituteNameSearch represents the model behind the search form about `common\models\InstituteName`.
 */
class InstituteNameSearch extends InstituteName
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Institute_name_id', 'created_by', 'updated_by'], 'integer'],
            [['Institute_name', 'Institutte_address', 'Institute_contact_no', 'head_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = InstituteName::find();

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
            'Institute_name_id' => $this->Institute_name_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'Institute_name', $this->Institute_name])
            ->andFilterWhere(['like', 'Institutte_address', $this->Institutte_address])
            ->andFilterWhere(['like', 'Institute_contact_no', $this->Institute_contact_no])
            ->andFilterWhere(['like', 'head_name', $this->head_name]);

        return $dataProvider;
    }
}
