<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property int $subject_id
 * @property string $subject_name
 * @property string $subject_alias
 * @property string $subject_description
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $delete_status
 *
 * @property StdAttendance[] $stdAttendances
 * @property TeacherSubjectAssignDetail[] $teacherSubjectAssignDetails
 */
class Subjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_name', 'subject_alias'], 'required'],
            [['created_at', 'updated_at', 'subject_description', 'created_by', 'updated_by'], 'safe'],
            [['created_by', 'updated_by', 'delete_status'], 'integer'],
            [['subject_name'], 'string', 'max' => 32],
            [['subject_alias'], 'string', 'max' => 10],
            [['subject_description'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'subject_name' => 'Subject Name',
            'subject_alias' => 'Subject Alias',
            'subject_description' => 'Subject Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'delete_status' => 'Delete Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdAttendances()
    {
        return $this->hasMany(StdAttendance::className(), ['subject_id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherSubjectAssignDetails()
    {
        return $this->hasMany(TeacherSubjectAssignDetail::className(), ['subject_id' => 'subject_id']);
    }
}
