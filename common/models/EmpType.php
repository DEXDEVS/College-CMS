<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "emp_type".
 *
 * @property integer $emp_type_id
 * @property string $emp_type
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property EmpInfo[] $empInfos
 */
class EmpType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emp_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_type'], 'required'],
            [['created_at', 'updated_at','created_by', 'updated_by'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['emp_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_type_id' => 'Emp Type ID',
            'emp_type' => 'Emp Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpInfos()
    {
        return $this->hasMany(EmpInfo::className(), ['emp_type_id' => 'emp_type_id']);
    }
}
