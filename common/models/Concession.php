<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "concession".
 *
 * @property int $concession_id
 * @property string $concession_name
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property StdFeeDetails[] $stdFeeDetails
 */
class Concession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'concession';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['concession_name', 'created_by', 'updated_by'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['concession_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'concession_id' => 'Concession ID',
            'concession_name' => 'Concession Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdFeeDetails()
    {
        return $this->hasMany(StdFeeDetails::className(), ['concession_id' => 'concession_id']);
    }
}
