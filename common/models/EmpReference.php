<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "emp_reference".
 *
 * @property integer $emp_ref_id
 * @property integer $emp_id
 * @property string $ref_name
 * @property integer $ref_contact_no
 * @property integer $ref_cnic
 * @property string $ref_designation
 *
 * @property EmpInfo $emp
 */
class EmpReference extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emp_reference';
    }

    /**
     * @inheritdoc
            [['ref_name', 'ref_contact_no', 'ref_cnic'], 'string', 'max' => 50],
     
     */
    public function rules()
    {
        return [
            [['emp_id', 'ref_name', 'ref_contact_no', 'ref_cnic', 'ref_designation'], 'required'],
            [['emp_id'], 'integer'],
            [['ref_designation'], 'string', 'max' => 100],
            [['emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmpInfo::className(), 'targetAttribute' => ['emp_id' => 'emp_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'emp_ref_id' => 'Emp Ref ID',
            'emp_id' => 'Emp Name',
            'ref_name' => 'Ref Name',
            'ref_contact_no' => 'Ref Contact No',
            'ref_cnic' => 'Ref Cnic',
            'ref_designation' => 'Ref Designation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmp()
    {
        return $this->hasOne(EmpInfo::className(), ['emp_id' => 'emp_id']);
    }
}
