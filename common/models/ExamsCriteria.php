<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exams_criteria".
 *
 * @property int $exam_criteria_id
 * @property int $exam_category_id
 * @property int $std_enroll_head_id
 * @property string $exam_start_date
 * @property string $exam_end_date
 * @property string $exam_start_time
 * @property string $exam_end_time
 * @property string $exam_room
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property ExamsCategory $examCategory
 * @property StdEnrollmentHead $stdEnrollHead
 * @property ExamsSchedule[] $examsSchedules
 */
class ExamsCriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exams_criteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exam_category_id', 'std_enroll_head_id', 'exam_start_date', 'exam_end_date', 'exam_start_time', 'exam_end_time', 'exam_room'], 'required'],
            [['exam_category_id', 'std_enroll_head_id', 'created_by', 'updated_by'], 'integer'],
            [['exam_start_date', 'exam_end_date', 'exam_start_time', 'exam_end_time', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['exam_room'], 'string', 'max' => 15],
            [['exam_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExamsCategory::className(), 'targetAttribute' => ['exam_category_id' => 'exam_category_id']],
            [['std_enroll_head_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdEnrollmentHead::className(), 'targetAttribute' => ['std_enroll_head_id' => 'std_enroll_head_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'exam_criteria_id' => 'Exam Criteria ID',
            'exam_category_id' => 'Exam Category',
            'std_enroll_head_id' => 'Class',
            'exam_start_date' => 'Exam Start Date',
            'exam_end_date' => 'Exam End Date',
            'exam_start_time' => 'Exam Start Time',
            'exam_end_time' => 'Exam End Time',
            'exam_room' => 'Exam Room',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamCategory()
    {
        return $this->hasOne(ExamsCategory::className(), ['exam_category_id' => 'exam_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStdEnrollHead()
    {
        return $this->hasOne(StdEnrollmentHead::className(), ['std_enroll_head_id' => 'std_enroll_head_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamsSchedules()
    {
        return $this->hasMany(ExamsSchedule::className(), ['exam_criteria_id' => 'exam_criteria_id']);
    }
}
