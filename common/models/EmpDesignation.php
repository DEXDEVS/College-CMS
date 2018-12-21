<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "emp_designation".
 *
 * @property integer $emp_designation_id
 * @property string $emp_designation
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property EmpInfo[] $empInfos
 */
class EmpDesignation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emp_designation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_designation'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['emp_designation'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_designation_id' => 'Emp Designation ID',
            'emp_designation' => 'Emp Designation',
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
        return $this->hasMany(EmpInfo::className(), ['emp_designation_id' => 'emp_designation_id']);
    }
}
