<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher_subject_assign_head".
 *
 * @property integer $teacher_subject_assign_head_id
 * @property integer $teacher_id
 * @property string $teacher_subject_assign_head_name
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property TeacherSubjectAssignDetail[] $teacherSubjectAssignDetails
 * @property EmpInfo $teacher
 */
class TeacherSubjectAssignHead extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher_subject_assign_head';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'teacher_subject_assign_head_name', 'created_by', 'updated_by'], 'required'],
            [['teacher_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['teacher_subject_assign_head_name'], 'string', 'max' => 200],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmpInfo::className(), 'targetAttribute' => ['teacher_id' => 'emp_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'teacher_subject_assign_head_id' => 'Teacher Subject Assign Head ID',
            'teacher_id' => 'Teacher ID',
            'teacher_subject_assign_head_name' => 'Teacher Subject Assign Head Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherSubjectAssignDetails()
    {
        return $this->hasMany(TeacherSubjectAssignDetail::className(), ['teacher_subject_assign_detail_head_id' => 'teacher_subject_assign_head_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(EmpInfo::className(), ['emp_id' => 'teacher_id']);
    }
}
