<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "emp_departments".
 *
 * @property int $emp_department_id
 * @property int $emp_id
 * @property int $dept_id
 *
 * @property EmpInfo $emp
 * @property Departments $dept
 */
class EmpDepartments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emp_departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_id', 'dept_id'], 'required'],
            [['emp_id', 'dept_id'], 'integer'],
            [['emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmpInfo::className(), 'targetAttribute' => ['emp_id' => 'emp_id']],
            [['dept_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['dept_id' => 'department_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emp_department_id' => 'Emp Department ID',
            'emp_id' => 'Emp ID',
            'dept_id' => 'Dept ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmp()
    {
        return $this->hasOne(EmpInfo::className(), ['emp_id' => 'emp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Departments::className(), ['department_id' => 'dept_id']);
    }
}
