<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "std_academic_info".
 *
 * @property int $academic_id
 * @property int $std_id
 * @property int $class_name_id
 * @property int $subject_combination
 * @property string $previous_class
 * @property string $passing_year
 * @property int $previous_class_rollno
 * @property int $total_marks
 * @property int $obtained_marks
 * @property string $grades
 * @property double $percentage
 * @property string $Institute
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $delete_status
 *
 * @property StdPersonalInfo $std
 * @property StdClassName $className
 * @property StdSubjects $subjectCombination
 */
class StdAcademicInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'std_academic_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['std_id', 'class_name_id', 'subject_combination', 'previous_class', 'passing_year', 'previous_class_rollno', 'Institute', ], 'required'],
            [['std_id', 'class_name_id', 'subject_combination', 'previous_class_rollno', 'total_marks', 'obtained_marks', 'created_by', 'updated_by', 'delete_status'], 'integer'],
            [['grades'], 'string', 'max' => 10],
            [['created_at', 'updated_at','created_by', 'updated_by'], 'safe'],
            [['previous_class', 'Institute', 'percentage'], 'string', 'max' => 50],
            [['passing_year'], 'string', 'max' => 32],
            [['std_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdPersonalInfo::className(), 'targetAttribute' => ['std_id' => 'std_id']],
            [['class_name_id'], 'exist', 'skipOnError' => true, 'targetClass' => StdClassName::className(), 'targetAttribute' => ['class_name_id' => 'class_name_id']],
            [['subject_combination'], 'exist', 'skipOnError' => true, 'targetClass' => StdSubjects::className(), 'targetAttribute' => ['subject_combination' => 'std_subject_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'academic_id' => 'Academic ID',
            'std_id' => 'Std ID',
            'class_name_id' => 'Class Name ID',
            'subject_combination' => 'Subject Combination',
            'previous_class' => 'Previous Class',
            'passing_year' => 'Passing Year',
            'previous_class_rollno' => 'Previous Class Rollno',
            'total_marks' => 'Total Marks',
            'obtained_marks' => 'Obtained Marks',
            'grades' => 'Grades',
            'percentage' => 'Percentage',
            'Institute' => 'Institute',
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
    public function getStd()
    {
        return $this->hasOne(StdPersonalInfo::className(), ['std_id' => 'std_id']);
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
    public function getSubjectCombination()
    {
        return $this->hasOne(StdSubjects::className(), ['std_subject_id' => 'subject_combination']);
    }
}
