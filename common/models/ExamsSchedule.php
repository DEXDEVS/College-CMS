<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exams_schedule".
 *
 * @property int $exam_schedule_id
 * @property int $exam_criteria_id
 * @property int $subject_id
 * @property int $emp_id
 * @property string $date
 * @property int $full_marks
 * @property int $passing_marks
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property ExamsCriteria $examCriteria
 * @property Subjects $subject
 * @property EmpInfo $emp
 */
class ExamsSchedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exams_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exam_criteria_id', 'subject_id', 'emp_id', 'date', 'full_marks', 'passing_marks'], 'required'],
            [['exam_criteria_id', 'subject_id', 'emp_id', 'full_marks', 'passing_marks', 'created_by', 'updated_by'], 'integer'],
            [['date', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['exam_criteria_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExamsCriteria::className(), 'targetAttribute' => ['exam_criteria_id' => 'exam_criteria_id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject_id' => 'subject_id']],
            [['emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmpInfo::className(), 'targetAttribute' => ['emp_id' => 'emp_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'exam_schedule_id' => 'Exam Schedule ID',
            'exam_criteria_id' => 'Exam Criteria ID',
            'subject_id' => 'Subject ID',
            'emp_id' => 'Emp ID',
            'date' => 'Date',
            'full_marks' => 'Full Marks',
            'passing_marks' => 'Passing Marks',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamCriteria()
    {
        return $this->hasOne(ExamsCriteria::className(), ['exam_criteria_id' => 'exam_criteria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::className(), ['subject_id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmp()
    {
        return $this->hasOne(EmpInfo::className(), ['emp_id' => 'emp_id']);
    }
}
