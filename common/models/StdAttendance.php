<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_attendance".
 *
 * @property integer $std_attend_id
 * @property integer $teacher_id
 * @property integer $class_name_id
 * @property integer $session_id
 * @property integer $section_id
 * @property string $date
 * @property integer $student_id
 * @property string $status
 *
 * @property StdClassName $className
 * @property StdPersonalInfo $student
 * @property EmpInfo $teacher
 * @property StdSessions $session
 * @property StdSections $section
 */
class StdAttendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'std_attendance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['teacher_id', 'class_name_id', 'session_id', 'section_id', 'date', 'student_id', 'status'], 'required'],
            [['teacher_id', 'class_name_id', 'session_id', 'section_id', 'student_id'], 'integer'],
            [['date'], 'safe'],
            [['status'], 'string', 'max' => 1],
            [['class_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdClassName::className(), 'targetAttribute' => ['class_name_id' => 'class_name_id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdPersonalInfo::className(), 'targetAttribute' => ['student_id' => 'std_id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmpInfo::className(), 'targetAttribute' => ['teacher_id' => 'emp_id']],
            [['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdSessions::className(), 'targetAttribute' => ['session_id' => 'session_id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdSections::className(), 'targetAttribute' => ['section_id' => 'section_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'std_attend_id' => 'Std Attend ID',
            'teacher_id' => 'Teacher Name',
            'class_name_id' => 'Class Name Name',
            'session_id' => 'Session Name',
            'section_id' => 'Section Name',
            'date' => 'Date',
            'student_id' => 'Student Name',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassName()
    {
        return $this->hasOne(StdClassName::className(), ['class_name_id' => 'class_name_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(StdPersonalInfo::className(), ['std_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(EmpInfo::className(), ['emp_id' => 'teacher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSession()
    {
        return $this->hasOne(StdSessions::className(), ['session_id' => 'session_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(StdSections::className(), ['section_id' => 'section_id']);
    }
}
