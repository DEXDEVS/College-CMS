<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EmpDocuments;

/**
 * EmpDocumentsSearch represents the model behind the search form about `common\models\EmpDocuments`.
 */
class EmpDocumentsSearch extends EmpDocuments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_document_id', 'emp_info_id', 'created_by', 'updated_by'], 'integer'],
            [['emp_document', 'created_at', 'updated_at','emp_document_name'], 'safe'],
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
        $query = EmpDocuments::find();

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
            'emp_document_id' => $this->emp_document_id,
            'emp_document_name' => $this->emp_document_name,
            'emp_info_id' => $this->emp_info_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'emp_document', $this->emp_document]);

        return $dataProvider;
    }
}
